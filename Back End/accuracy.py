# -*- coding: utf-8 -*-
"""
Created on Mon Mar  4 19:49:05 2019

@author: lenovo
"""

# Import dependencies
import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
np.random.seed(42)

# Load the dataset in a dataframe object and include only four features as mentioned
file = "Datasets/encoded.csv"
df = pd.read_csv(file)




# Logistic Regression classifier
from sklearn import linear_model

include = df[['age', 'trestbps', 'chol', 'thalah', 'oldpeak', 'sex_0', 'sex_1',
       'cp_1', 'cp_2', 'cp_3', 'cp_4', 'fbs_0', 'fbs_1', 'restecg_0',
       'restecg_1', 'restecg_2', 'exang_0', 'exang_1', 'slope_1', 'slope_2',
       'slope_3', 'ca_0', 'ca_1', 'ca_2', 'ca_3', 'thal_3', 'thal_6', 'thal_7']]
dependent_variable = np.ravel(df[['num']])
x_train, x_test, y_train, y_test = train_test_split(include, dependent_variable, test_size=0.2, random_state=42)

from sklearn.linear_model import LogisticRegression
logreg = LogisticRegression(solver="newton-cg", multi_class="ovr")
logreg.fit(x_train, y_train)
accuracy = logreg.score(x_train, y_train)*100
print("Accuracy LR:",accuracy)

#Import svm model
from sklearn import svm

#Create a svm Classifier
clf = svm.SVC(kernel='linear') # Linear Kernel

#Train the model using the training sets
clf.fit(x_train, y_train)

#Predict the response for test dataset
y_pred = clf.predict(x_test)

print("Accuracy SVM:",accuracy_score(y_test, y_pred)*100)


from sklearn.naive_bayes import GaussianNB

#Create a Gaussian Classifier
gnb = GaussianNB()

#Train the model using the training sets
gnb.fit(x_train, y_train)

#Predict the response for test dataset
y_pred = gnb.predict(x_test)
from sklearn import metrics

# Model Accuracy, how often is the classifier correct?
print("Accuracy NB:",metrics.accuracy_score(y_test, y_pred)*100)
