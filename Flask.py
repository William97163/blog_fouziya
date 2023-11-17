from flask import Flask, request, jsonify, redirect
from flask_mysqldb import MySQL

app = Flask(__name__)

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'blog_fouziya'

mysql = MySQL(app)

@app.route('/utilisateurs', methods=['GET', 'POST'])
def utilisateurs():
    cursor = mysql.connection.cursor()
    if request.method == 'GET':
        try:
            cursor.execute('SELECT id, pseudo, mail, tel FROM Utilisateur')
            data = cursor.fetchall()
            return jsonify(data)
        except:
            return "Erreur lors de la récupération des données utilisateur"
    elif request.method == 'POST':
        pseudo = request.form['pseudo']
        try:
            cursor.execute("SELECT id, pseudo, mail, tel FROM Utilisateur WHERE pseudo = %s", (pseudo,))
            data = cursor.fetchall()
            return jsonify(data)
        except:
            return "Erreur lors de la récupération des données utilisateur"

@app.route('/utilisateur', methods=['POST'])
def utilisateur():
    cursor = mysql.connection.cursor()
    id = request.form['id']
    if request.method == 'POST':
        try:
            cursor.execute("SELECT * FROM utilisateur WHERE id = %s", (id))
            data = cursor.fetchall()
            return jsonify(data)
        except:
            return f"Erreur lors de la récupération des données utilisateur {id}"

@app.route('/login', methods=['POST'])
def login():
    cursor = mysql.connection.cursor()
    if request.method == 'POST':
        pseudo = request.form['pseudo']
        mdp = request.form['mdp']
        try:

            cursor.execute("SELECT id, pseudo, mail, tel, is_admin FROM Utilisateur WHERE pseudo = %s AND mdp = %s", (pseudo, mdp))
            user = cursor.fetchall()
            try:
                cursor.execute("SELECT * FROM Admin WHERE id_user = %s", (user[0][0]))
                admin = cursor.fetchall()
                return jsonify(admin)
            except:
                return jsonify(user)

        except:
            return "Erreur lors de la récupération des données utilisateur"

@app.route('/isAdmin', methods=['POST'])
def isAdmin():
    cursor = mysql.connection.cursor()
    if request.method == 'POST':
        id = request.form['id']
        try:
            cursor.execute("SELECT id FROM Admin WHERE id_user = %s", (id))
            user = cursor.fetchall()
            if len(user) > 0:
                return jsonify(True)
            else:
                return jsonify(False)
        except:
            return "Erreur lors de la récupération des données admin"


@app.route('/posts', methods=['GET', 'POST'])
def posts():
    cursor = mysql.connection.cursor()
    if request.method == 'GET':
        try:
            cursor.execute('SELECT * FROM Post')
            data = cursor.fetchall()
            return jsonify(data)
        except:
            return "Erreur lors de la récupération des données post"
    elif request.method == 'POST':
        contenu = request.form['contenu']
        title = request.form['title']
        id_admin = request.form['id_admin']
        try:
            cursor.execute("INSERT INTO Post (contenu, title, id_admin) VALUES (%s, %s, %s)",
                           (contenu, title, id_admin))
            mysql.connection.commit()
            return "post ajouté"
        except:
            return "Erreur lors de l'ajout du post"

@app.route('/post', methods=['POST'])
def post():
    cursor = mysql.connection.cursor()
    if request.method == 'POST':
        try:
            id_post = request.form['id_post']
            cursor.execute("SELECT * FROM Post WHERE id = %s", (id_post))
            data = cursor.fetchall()
            return jsonify(data)
        except:
            return "Erreur lors de la récupération des données post"

@app.route('/commentaires_post', methods=['POST'])
def commentaires_post():
    cursor = mysql.connection.cursor()
    id_post = request.form['id_post']

    if request.method == 'POST':
        try:
            cursor.execute("SELECT * FROM commentaire WHERE id_post = %s", (id_post))

            data = cursor.fetchall()
            return jsonify(data)
        except:
            return "Erreur lors de la récupération des commentaires"

@app.route('/commentaires', methods=['GET', 'POST'])
def commentaires():
    cursor = mysql.connection.cursor()
    if request.method == 'GET':
        try:
            cursor.execute('SELECT * FROM Commentaire')
            data = cursor.fetchall()
            return jsonify(data)
        except:
            return "Erreur lors de la récupération des commentaires"
    elif request.method == 'POST':
        contenu = request.form['contenu']
        id_user = request.form['id_user']
        id_post = request.form['id_post']
        try:
            cursor.execute(f"INSERT INTO Commentaire (contenu, id_user, id_post) VALUES (%s, %s, %s)",
                           (contenu, id_user, id_post))
            mysql.connection.commit()
            return redirect(f"http://127.0.0.1:8000/posts/{id_post}", code=302)
        except:
            return "Erreur lors de l'ajout du commentaire"


@app.route('/addLike', methods=['POST'])
def addLike():
    cursor = mysql.connection.cursor()
    if request.method == 'POST':
        id_user = request.form['id_user']
        id_post = request.form['id_post']
        try:
            cursor.execute("SELECT * FROM LikePost WHERE id_user = %s AND id_post = %s", (id_user, id_post))
            data = len(cursor.fetchall())
            print(data)
            if data > 0:
                return "like deja existant"
            else:
                cursor.execute(f"INSERT INTO LikePost (id_user, id_post) VALUES (%s, %s)",
                               (id_user, id_post))
                mysql.connection.commit()
                return "like ajouté"
        except:
            return "Erreur lors de l'ajout du like"

@app.route('/likes', methods=['POST'])
def likes():
    cursor = mysql.connection.cursor()
    if request.method == 'POST':
        id_post = request.form['id_post']
        try:
            cursor.execute("SELECT * FROM LikePost WHERE id_post = %s", (id_post))
            data = len(cursor.fetchall())
            return jsonify(data)
        except:
            return "Erreur lors du comptage de like"
if __name__ == "__main__":
    app.run(host='localhost', port=5000)