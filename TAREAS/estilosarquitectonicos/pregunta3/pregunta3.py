import pandas as pd
import mysql.connector
from datetime import datetime

# Método para filtrar nombres y apellidos sin números
def filtrar_nombres_apellidos(ciudadanos):
    ciudadanos = ciudadanos[ciudadanos.apply(lambda x: x.str.isalpha(), axis=1)]
    return ciudadanos

# Método para unir nombres
def unir_nombres(ciudadanos):
    ciudadanos['nombres'] = ciudadanos['nombre1'] + ' ' + ciudadanos['nombre2']
    return ciudadanos

# Método para convertir la fecha al formato yyyy-mm-dd
def convertir_fecha(ciudadanos):
    ciudadanos['fecha'] = ciudadanos['fecha'].apply(lambda x: datetime.strptime(x, '%d/%m/%Y').strftime('%Y-%m-%d'))
    return ciudadanos

# Método para guardar en la base de datos
def guardar_en_bd(ciudadanos):
    conn = mysql.connector.connect(
        host='localhost',
        user='tu_usuario',
        password='tu_contraseña',
        database='tu_base_de_datos'
    )
    
    cursor = conn.cursor()

    # Crear la tabla si no existe
    cursor.execute('''
        CREATE TABLE IF NOT EXISTS ciudadano (
            ci INT PRIMARY KEY,
            nombres VARCHAR(30),
            apellidos VARCHAR(45),
            fecha DATE
        )
    ''')

    # Insertar los datos en la tabla
    for index, row in ciudadanos.iterrows():
        cursor.execute('''
            INSERT INTO ciudadano (ci, nombres, apellidos, fecha)
            VALUES (%s, %s, %s, %s)
        ''', (row['ci'], row['nombres'], row['paterno'] + ' ' + row['mate'], row['fecha']))

    conn.commit()
    conn.close()

if __name__ == '__main__':
    # Leer el archivo CSV
    archivo_csv = 'ciudadanos.csv'
    ciudadanos = pd.read_csv(archivo_csv, delimiter=';', names=['ci', 'nombre1', 'nombre2', 'paterno', 'mate', 'fecha'])

    # Filtrar nombres y apellidos
    ciudadanos_filtrados = filtrar_nombres_apellidos(ciudadanos)

    # Unir nombres
    ciudadanos_unidos = unir_nombres(ciudadanos_filtrados)

    # Convertir fecha
    ciudadanos_con_fecha_convertida = convertir_fecha(ciudadanos_unidos)

    # Guardar en la base de datos
    guardar_en_bd(ciudadanos_con_fecha_convertida)

    print('Proceso completado. Datos guardados en la base de datos.')
