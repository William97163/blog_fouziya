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
            cursor.execute('SELECT pseudo, mail, tel FROM Utilisateur')
            data = cursor.fetchall()
            return jsonify(data)
        except:
            return "Erreur lors de la récupération des données utilisateur"
    elif request.method == 'POST':
        pseudo = request.form['pseudo']
        try:
            cursor.execute("SELECT pseudo, mail, tel FROM Utilisateur WHERE pseudo = %s", (pseudo,))
            data = cursor.fetchall()
            return jsonify(data)
        except:
            return "Erreur lors de la récupération des données utilisateur"

@app.route('/login', methods=['POST'])
def login():
    cursor = mysql.connection.cursor()
    if request.method == 'POST':
        pseudo = request.form['pseudo']
        mdp = request.form['mdp']
        try:

            cursor.execute("SELECT name, pseudo, mail, tel FROM Utilisateur WHERE pseudo = %s AND mdp = %s", (pseudo, mdp))

            print(pseudo)
            data = cursor.fetchall()

            print(data[0].id)
            cursor.execute("SELECT name, pseudo, mail, tel FROM Admin WHERE id_user = %s", (data[0].id))
            return jsonify(data)
        except:
            return "Erreur lors de la récupération des données utilisateur"
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
            return redirect("http://127.0.0.1:8000/posts", code=302)
        except:
            return "Erreur lors de l'ajout du post"

@app.route('/post', methods=['POST'])
def post():
    cursor = mysql.connection.cursor()
    id_post = request.form['id_post']
    if request.method == 'POST':
        try:
            cursor.execute("SELECT * FROM Post WHERE id_post = %s", (id_post))

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

@app.route('/like', methods=['POST'])
def like():
    cursor = mysql.connection.cursor()
    if request.method == 'POST':
        id_user = request.form['id_user']
        id_post = request.form['id_post']
        try:
            cursor.execute(f"INSERT INTO LikePost (id_user, id_post) VALUES (%s, %s)",
                           (id_user, id_post))
            mysql.connection.commit()
            return redirect(f"http://127.0.0.1:8000/posts/{id_post}", code=302)
        except:
            return "Erreur lors de l'ajout du like"

if __name__ == "__main__":
    app.run(host='localhost', port=5000)