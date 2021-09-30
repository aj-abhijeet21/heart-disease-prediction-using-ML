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
file = "../Datasets/type.csv"
df = pd.read_csv(file)
include = df[['q1','q2','q3','q4','q5','q6','q7','q8','q9','q10']] # Only four features




# Logistic Regression classifier
from sklearn import linear_model
dependent_variable = np.ravel(df[['type']])
x_train, x_test, y_train, y_test = train_test_split(include, dependent_variable, test_size=0.2, random_state=42)
lm = linear_model.LinearRegression()
lm.fit(x_train, y_train)

# Save your model
from sklearn.externals import joblib
joblib.dump(lm, 'linearmodel.pkl')
print("Model dumped!")

# Load the model that you just saved
lm = joblib.load('linearmodel.pkl')

