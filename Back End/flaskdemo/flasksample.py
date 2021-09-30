from flask import Flask, render_template, request
from sklearn.externals import joblib
import pandas as pd
import pickle
app = Flask(__name__)

@app.route('/predict', methods=['GET','POST'])
def predict():
    if request.method == 'POST':
        slen = request.form['slen']
        swid = request.form['swid']
        plen = request.form['plen']
        pwid = request.form['pwid']

        test_data = [[slen, swid, plen, pwid]]
        class_predicted = int(svmIrisModel.predict(test_data))
        value = "Predicted class:" + str(class_predicted)
        #return(value)
        if(class_predicted == 0):
            type = 'sepal length'
        if (class_predicted == 1):
            type = 'sepal width'
        if (class_predicted == 2):
            type = 'petal length'
        if (class_predicted == 3):
            type = 'petal width'

        return render_template('age.html', value = type)
    return render_template('index.html')


def load_model():
	global svmIrisModel
	svmIrisModel = pd.read_pickle("SVMmodel.pckl") # Load "model.pkl"
    #svmIrisFile = open('SVMmodel.pckl', 'rb')
    #svmIrisModel = pickle.load(svmIrisFile)
    #svmIrisFile.close()
if __name__ == "__main__":
    load_model()
    app.run(debug= True)
