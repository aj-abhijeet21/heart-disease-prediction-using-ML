# -*- coding: utf-8 -*-
"""
Created on Thu Feb 28 09:53:26 2019

@author: lenovo
"""

import pandas as pd
from sklearn.tree import DecisionTreeClassifier # Import Decision Tree Classifier
from sklearn.model_selection import train_test_split # Import train_test_split function
from sklearn import metrics #Import scikit-learn metrics module for accuracy calculation
file1 = "Datasets/encoded.csv"
df = pd.read_csv(file1, sep= ',')
import numpy as np
np.random.seed(42)

x = df[['age', 'trestbps', 'chol', 'thalah', 'oldpeak', 'sex_0', 'sex_1',
       'cp_1', 'cp_2', 'cp_3', 'cp_4', 'fbs_0', 'fbs_1', 'restecg_0',
       'restecg_1', 'restecg_2', 'exang_0', 'exang_1', 'slope_1', 'slope_2',
       'slope_3', 'ca_0', 'ca_1', 'ca_2', 'ca_3', 'thal_3', 'thal_6', 'thal_7']]
y = np.ravel(df[['num']])

#print(df)
#y = df1.pop('num').values

# print(list(df))
#z = df1.pop('ca').values #63 with rbs
#z1 = df1.pop('thalach').values
#z2 = df1.pop('chol').values
#z3 = df1.pop('age').values

x_train, x_test, y_train, y_test = train_test_split(x, y, test_size=0.2, random_state=42)
clf = DecisionTreeClassifier()

# Train Decision Tree Classifer
clf = clf.fit(x_train,y_train)

#Predict the response for test dataset
y_pred = clf.predict(x_test)
print("Accuracy:",metrics.accuracy_score(y_test, y_pred)*100)