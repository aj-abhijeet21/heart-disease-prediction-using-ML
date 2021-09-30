# -*- coding: utf-8 -*-
"""
Created on Mon Mar  4 18:32:41 2019

@author: lenovo
"""

import pickle
import pandas as pd
import numpy as np
np.random.seed(42)

from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
df = pd.read_csv("../Datasets/encoded.csv")
x = df[['age', 'trestbps', 'chol', 'thalah', 'oldpeak', 'sex_0', 'sex_1',
       'cp_1', 'cp_2', 'cp_3', 'cp_4', 'fbs_0', 'fbs_1', 'restecg_0',
       'restecg_1', 'restecg_2', 'exang_0', 'exang_1', 'slope_1', 'slope_2',
       'slope_3', 'ca_0', 'ca_1', 'ca_2', 'ca_3', 'thal_3', 'thal_6', 'thal_7']]
y = np.ravel(df[['num']])
x_train, x_test, y_train, y_test = train_test_split(x, y, test_size=0.2, random_state=42)
from sklearn.linear_model import LogisticRegression
logreg = LogisticRegression(solver="newton-cg", multi_class="ovr")
logreg.fit(x_train, y_train)

modelFile = open('/LRModel.pckl', 'wb')
pickle.dump(logreg, modelFile)
modelFile.close()
accuracy = logreg.score(x_train, y_train)*100
print(accuracy)
