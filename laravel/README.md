# Code Challenge

### Laravel API Rest VueJS SPA  [Dificultad: Baja]

#### CODE CHALLENGE

#### Instrucciones:

1. Crear colección de nodos API Rest del siguiente diagrama ER (Ver imagen).
2. Crear una aplicación SPA con VueJS que consuma y pueda interacturar con todos los métodos cruds de la API Rest. (Considerar las siguientes pantallas en la aplicación SPA: Registro, Iniciar sesión, Confirmación de correo electrónico, Restablecer contraseña)
3. Proteger las rutas con sanctum o con JWT y justificar la implementación seleccionada.
4. Elige algún motor de base de datos para almacenar los datos (Postgres, Mysql, MariaDB, MSSQL)de la API Rest y justifica la elección.
5. Versiona el código y cada uno de los pasos siguiendo la convención de Gitflow Workflow.
6. Documentar API Rest con Swagger.
7. Publicar API Rest y Aplicación SPA en alguna capa gratuita: Heroku, Elastic Beanstalk AWS, Render, Firebase, etc. y agregar url en readme del proyecto.

![](model-1.png)

#### Nota:
Se evaluarán las prácticas en código, por lo tanto, tienes la oportunidad de ser seleccionado si demuestras habilidades
con pruebas unitarias, implementación de patrones de diseño para reutilizar código, dominio general del proceso de desarrollo e implementación.

Al finalizar compartir url del repositorio por whatsapp al siguiente contacto:
- Teléfono: 3325154811
- Email: mario@dropstudio.mx


# RESPUESTAS:
## PUNTO 3:
Sanctum supera a JWT en Laravel en varios aspectos fundamentales. Primero, Sanctum ofrece una integración nativa y coherente con el ecosistema de Laravel, aprovechando las características de autenticación y autorización del framework de manera transparente. Además, Sanctum proporciona autenticación stateful a través de tokens de sesión, lo que permite mantener el estado de autenticación en aplicaciones de una sola página (SPA) y aplicaciones móviles. Esto es esencial para garantizar una experiencia de usuario fluida y segura. Sanctum también permite un control granular sobre los permisos y políticas de autorización, lo que brinda una capa adicional de seguridad y flexibilidad en la gestión de los accesos a las rutas y recursos de la API. Por último, Sanctum cuenta con una documentación sólida y una comunidad activa de desarrolladores, lo que facilita el aprendizaje y el soporte continuo. En resumen, Sanctum es la opción preferida en Laravel debido a su enfoque nativo, seguridad mejorada y facilidad de uso en comparación con JWT.

## PUNTO 4
MySQL destaca como la mejor opción entre las mencionadas debido a su combinación de rendimiento, estabilidad y flexibilidad. Con su arquitectura probada, capacidad de escalamiento horizontal y vertical, así como una amplia compatibilidad con diversas plataformas y herramientas, MySQL es una elección sólida para entornos empresariales y de desarrollo. Además, cuenta con una sólida optimización y herramientas de administración, soporte de transacciones ACID y una comunidad activa que respalda continuamente su desarrollo y mejora. Estos factores hacen de MySQL la elección preferida en numerosos proyectos y empresas de renombre en todo el mundo.
