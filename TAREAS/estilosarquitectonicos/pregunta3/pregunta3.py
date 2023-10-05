import pandas as pd
import mysql.connector
from datetime import datetime
import os
#para que se ejecute pandas lo installe en la terminal con pip install

# Obtener la ruta absoluta del directorio actual
current_directory = os.path.abspath(os.path.dirname(__file__))

# Construir la ruta completa al archivo ciudadanos.csv
filename = os.path.join(current_directory, 'ciudadanos.csv')
print(f"La ruta completa del archivo es: {filename}")

data = pd.read_csv(filename, delimiter='.')

if os.path.exists(filename):
    print(f"El archivo {filename} SI existe.")
else:
    print(f"El archivo {filename} no existe.")
data.info()
data.shape
print(data)

# Método para filtrar nombres y apellidos sin números
def filtrar_nombres_apellidos(data):
    for col in ['nombre1', 'nombre2', 'paterno', 'materno']:
        data[col] = data[col].str.replace('\d+', '', regex=True)
    return data


# Método para eliminar letras en el CI
def filtrar_ci(data):
    data['ci'] = data['ci'].str.replace('[a-zA-Z]', '', regex=True)
    return data

# Método para unir nombres
def unir_nombres(data):
    data['nombres'] = data['nombre1'] + ' ' + data['nombre2']
    return data

# Método para convertir fecha al formato yyyy-mm-dd
def convertir_fecha(data):
    data['fecha'] = pd.to_datetime(data['fecha'], format='%d/%m/%Y').dt.strftime('%Y-%m-%d')
    return data

# Método para guardar en la base de datos MySQL
def guardar_en_mysql(data):
    # Conexión a la base de datos MySQL (reemplaza los valores con los de tu configuración)
    conn = mysql.connector.connect(
        host='localhost',
        user='tu_usuario',
        password='tu_contraseña',
        database='bd_personas'
    )

    # Crear un cursor
    cursor = conn.cursor()

    # Crear la tabla si no existe
    cursor.execute('''
        CREATE TABLE IF NOT EXISTS ciudadano (
            ci INT,
            nombres VARCHAR(30),
            apellidos VARCHAR(45),
            fecha DATE
        )
    ''')

    # Insertar datos en la tabla
    for _, row in data.iterrows():
        cursor.execute('''
            INSERT INTO ciudadano (ci, nombres, apellidos, fecha)
            VALUES (%s, %s, %s, %s)
        ''', (int(row['ci']), row['nombres'], row['paterno'] + ' ' + row['materno'], row['fecha']))

    # Hacer commit para guardar los cambios
    conn.commit()

    # Cerrar cursor y conexión
    cursor.close()
    conn.close()

# Leer el archivo CSV
filename = 'ciudadanos.csv'
data = pd.read_csv(filename, delimiter=';')

# Aplicar los métodos (filtros)
data = filtrar_nombres_apellidos(data)
data = filtrar_ci(data)
data = unir_nombres(data)
data = convertir_fecha(data)

# Mostrar datos antes de guardar
print("Datos antes de guardar en la base de datos:")
print(data.head())

# Guardar en la base de datos MySQL
guardar_en_mysql(data)

print("\nDatos guardados en la base de datos MySQL.")
