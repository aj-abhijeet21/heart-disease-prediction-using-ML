# -*- coding: utf-8 -*-
"""
Created on Mon Mar  4 19:49:05 2019

@author: lenovo
"""

# Import dependencies
import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
np.random.seed(42)

# Load the dataset in a dataframe object and include only four features as mentioned
file = "../Datasets/encoded.csv"
df = pd.read_csv(file)
include = df[['age', 'trestbps', 'chol', 'thalah', 'oldpeak', 'sex_0', 'sex_1',
       'cp_1', 'cp_2', 'cp_3', 'cp_4', 'fbs_0', 'fbs_1', 'restecg_0',
       'restecg_1', 'restecg_2', 'exang_0', 'exang_1', 'slope_1', 'slope_2',
       'slope_3', 'ca_0', 'ca_1', 'ca_2', 'ca_3', 'thal_3', 'thal_6', 'thal_7']] # Only four features




# Logistic Regression classifier
from sklearn.linear_model import LogisticRegression
dependent_variable = np.ravel(df[['num']])
x_train, x_test, y_train, y_test = train_test_split(include, dependent_variable, test_size=0.2, random_state=42)
logreg = LogisticRegression(solver="newton-cg", multi_class="ovr")
logreg.fit(x_train, y_train)

# Save your model
from sklearn.externals import joblib
joblib.dump(logreg, 'model.pkl')
print("Model dumped!")

# Load the model that you just saved
lr = joblib.load('model.pkl')

# Saving the data columns from training
model_columns = list(include.columns)
joblib.dump(model_columns, 'model_columns.pkl')
print("Models columns dumped!")