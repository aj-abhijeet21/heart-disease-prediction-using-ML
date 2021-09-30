# -*- coding: utf-8 -*-
"""
Created on Wed Feb 27 23:10:59 2019

@author: lenovo
"""
import pandas as pd
import numpy as np
from sklearn.svm import SVC
from sklearn.model_selection import GridSearchCV

data = pd.read_csv("Datasets/data.csv")
y = data.pop('num').values

(X, y) = (data.values, y)

# Using the same ranges for C and gamma as default in LibSVM grid.py
gamma_range = np.logspace(3, -15, 10, base=2)
C_range = np.logspace(-5, 15, 11, base=2)

tuned_parameters = [{'kernel': ['rbf'], 'gamma': gamma_range ,
                         'C': C_range}]
grid = GridSearchCV(SVC(), tuned_parameters, cv=5)
grid.fit(X, y)

print("Best parameters set found on development set:")
print(grid.best_params_)
print("The best parameters are %s with a score of %0.2f"
          % (grid.best_params_, grid.best_score_))