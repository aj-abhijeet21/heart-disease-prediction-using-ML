# -*- coding: utf-8 -*-
"""
Created on Mon Mar  4 19:36:23 2019

@author: lenovo
"""

from flask import Flask, render_template, request
import numpy as np
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
        class_predicted = int(HeartModel.predict(test_data))
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
    global HeartModel
    LRFile = open('LRModel.pckl', 'rb')
    HeartModel = pickle.load(LRFile)
    LRFile.close()
if __name__ == "__main__":
    load_model()
    app.run(debug= True, port= 6969)
