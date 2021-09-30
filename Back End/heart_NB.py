from sklearn.naive_bayes import GaussianNB
model = GaussianNB()

import pandas as pd
df = pd.read_csv("Datasets/file.csv")
# print(list(df))
y = df.pop('num').values

from sklearn.model_selection import train_test_split
x_train, x_test, y_train, y_test = train_test_split(df, y, test_size=0.2, random_state=109)

model.fit(x_train,y_train)
y_pred = model.predict(x_test)

from sklearn import metrics
print("accuracy:", metrics.accuracy_score(y_test,y_pred)*100)

