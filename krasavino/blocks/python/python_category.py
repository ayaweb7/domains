#!C:/Python310/python
# ----------------------------------------------------
# IMPORT LIBRARIES
# ----------------------------------------------------
# Pandas
import pandas as pd
import numpy as np
import sys

# Vizualization
import seaborn as sns
import matplotlib.pyplot as plt

from datetime import datetime
import datetime
from matplotlib import rcParams

''''''
# --------------------------------------------
# Plots For Shops & Store
# --------------------------------------------
# Downloads files
file_shops = 'shops.csv'
file_store = 'store.csv'

# Объявляем пользовательские переменные (год и заголовки)
year=sys.argv[1]
# suptitle=sys.argv[2]
# print(f"year={year}, suptitle={suptitle}")
# print(f"sys.argv - {sys.argv} sys.argv[1] - {year}".encode('utf8').decode('cp1251'))


# $$$$$$$$$$$$$$$$$$$$$$$$$$$$          FUNCTION SHOPS          $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
# Функция считывает файл, переименовывает колонки, считает суммы, сохраняет результат в новый файл.
def shops_report(file_path):
    df = pd.read_csv(file_path)
    df = df \
    .iloc[:, [0, 1, 2, 3, 4, 6, 8, 9]]
    
    df['month'] = df['date'].apply(lambda x: x.split('-')[1])
    df['month_number'] = df['date'].apply(lambda x: x.split('-')[1]).astype(str).astype(int) 
    df['year'] = df['date'].apply(lambda x: x.split('-')[0]).astype(str).astype(int)    
    
    return df

# $$$$$$$$$$$$$$$$$$$$$$$$$$$$          FUNCTION STORE          $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
# Функция считывает файл, переименовывает колонки, считает суммы, сохраняет результат в новый файл.
def store_report(file_path):
    df = pd.read_csv(file_path)
    df = df \
    .iloc[:, [1, 5]]
    
    return df

# $$$$$$$$$$$$$$$$$$$$$$$$$$$$          FUNCTION MERGE          $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
# Функция объединяет таблицы, переименовывает колонки, считает суммы, сохраняет результат в новый файл.
def merge_report(tab1, tab2):
    df = pd.merge(tab1, tab2, left_on ='shop', right_on = 'shop', how='left')

    columns_titles = ['id', 'gruppa', 'name', 'quantity', 'price', 'amount', 'shop', 'town', 'date', 'month_number', 'month', 'year']
    df=df.reindex(columns=columns_titles)

    return df

shops = shops_report(file_shops)
store = store_report(file_store)
all_shops = merge_report(shops, store)

# Функция для преобразования месяцев из числа от 1 до 12 в название месяца на русском языке
look_up = {'01': 'Январь', '02': 'Февраль', '03': 'Март', '04': 'Апрель', '05': 'Май', '06': 'Июнь',
           '07': 'Июль', '08': 'Август', '09': 'Сентябрь', '10': 'Октябрь', '11': 'Ноябрь', '12': 'Декабрь'}

all_shops['month_name'] = all_shops['month'].apply(lambda x: look_up[x])

#print(all_shops.dtypes)

'''
if sys.argv[1] == 'все':
# TABLE_1: Количество покупок по группам
    subtitle = 'Общее распределение покупок по категориям за все годы'
    purchashes_count = all_shops.groupby(['gruppa'], as_index=False) \
        .agg({'amount': 'count'}) \
        .rename(columns={'amount': 'count_purchashes'}) \
        .sort_values('count_purchashes', ascending = False)

# TABLE_2: Денежные затраты по группам
    purchashes_sum = all_shops.groupby(['gruppa'], as_index=False) \
        .agg({'amount': 'sum'}) \
        .rename(columns={'amount': 'sum_purchashes'}) \
        .sort_values('sum_purchashes', ascending = False)
        
else:
# TABLE_11: Количество покупок по группам за какой-то год
    subtitle = 'Распределение покупок за sys.argv[1] год по категориям'
    purchashes_count = all_shops.query(f"year == {year}") \
        .groupby(['gruppa'], as_index=False) \
        .agg({'amount': 'count'}) \
        .rename(columns={'amount': 'count_purchashes'}) \
        .sort_values('count_purchashes', ascending = False)

# TABLE_21: Денежные затраты по группам за какой-то год
    purchashes_sum = all_shops.query(f"year == {year}") \
        .groupby(['gruppa'], as_index=False) \
        .agg({'amount': 'sum'}) \
        .rename(columns={'amount': 'sum_purchashes'}) \
        .sort_values('sum_purchashes', ascending = False)
'''

''''''
if sys.argv[1] == 'все':
    suptitle = 'Общее распределение покупок по категориям за все годы'
    purchashes_count = all_shops.groupby(['gruppa'], as_index=False).agg({'amount': 'count'}).rename(columns={'amount': 'count_purchashes'}).sort_values('count_purchashes', ascending = False)
    purchashes_sum = all_shops.groupby(['gruppa'], as_index=False).agg({'amount': 'sum'}).rename(columns={'amount': 'sum_purchashes'}).sort_values('sum_purchashes', ascending = False)

else:
    suptitle = f'Распределение покупок за {year} год по категориям'
    purchashes_count = all_shops.query(f"year == {year}").groupby(['gruppa'], as_index=False).agg({'amount': 'count'}).rename(columns={'amount': 'count_purchashes'}).sort_values('count_purchashes', ascending = False)
    purchashes_sum = all_shops.query(f"year == {year}").groupby(['gruppa'], as_index=False).agg({'amount': 'sum'}).rename(columns={'amount': 'sum_purchashes'}).sort_values('sum_purchashes', ascending = False)


'''
# TABLE_3: Объединяем ДВЕ таблички: "purchashes_count" и "purchashes_sum" в одну для дальнейшего анализа.
purchashes = pd.merge(purchashes_count, purchashes_sum, left_on ='gruppa', right_on = 'gruppa', how='left')

# TABLE_3: Количество популярных покупок по месяцам
lovely_name = all_shops.groupby(['month','name'], as_index=False) \
    .agg({'amount': 'sum'}) \
    .rename(columns={'quantity': 'name_count'})

# TABLE_4: Количество показов рекламы ПО ПОПУЛЯРНЫМ ЗАПРОСАМ
lovely_name_count = all_shops.groupby(['month', 'name'], as_index=False) \
    .agg({'amount': 'count'}) \
    .sort_values('amount', ascending=False) \
    .groupby('month') \
    .head(1) \
    .rename(columns={'name': 'popular_name'})
'''

# --------------------------------------------
# Plot_1
# --------------------------------------------
# Поменяли настройки границ по умолчанию - остальную функцию оставили без изменений
rcParams['axes.spines.bottom'] = False
rcParams['axes.spines.left'] = False
rcParams['axes.spines.right'] = False
rcParams['axes.spines.top'] = False

# Графики распределения покупок по категориям товаров
figsize = (18, 7)
facecolor='white'
suptitle_fontsize = 20
title_fontsize = 14
ticklabels_fontsize = 10
label_fontsize = 12

color=['b', 'r']
data=['purchashes_count', 'purchashes_sum']
# x_data='gruppa'
# y_data=['count_purchashes', 'sum_purchashes']
#suptitle='Распределение покупок по категориям'
title=['Количество покупок', 'Денежные затраты']
x_label='Категории товаров'
y_label=['Количество покупок, шт.', 'Денежные затраты, руб.']

# plt.figure(figsize=(15, 5))
fig, ax = plt.subplots(1, 2, figsize=figsize, facecolor=facecolor) # , sharex=True
sns.set_style("whitegrid", {'axes.spines.left': False,
                            'axes.spines.bottom': False,
                            'axes.spines.right': False,
                            'axes.spines.top': False})

sns.barplot(x='gruppa', 
            y='count_purchashes', 
            data=purchashes_count,
            ax = ax[0])
sns.barplot(x='gruppa', 
            y='sum_purchashes', 
            data=purchashes_sum,
            ax = ax[1])


# Заголовок области Figure:
fig.suptitle(suptitle, y = 1, fontsize = suptitle_fontsize)

# выбираем отображение горизонтальных линий сетки
# ax[0].grid(axis = 'y')
# ax[1].grid(axis = 'y')

ax[0].set_xticklabels(purchashes_count.gruppa,
                  fontsize = ticklabels_fontsize, # horizontal
                   color = 'k',    #  Цвет текста
                   rotation = 50,    #  Поворот текста
                   ha='right')    #  Вертикальное выравнивание
ax[1].set_xticklabels(purchashes_sum.gruppa,
                  fontsize = ticklabels_fontsize, # horizontal
                   color = 'k',    #  Цвет текста
                   rotation = 50,    #  Поворот текста
                   ha='right')    #  Вертикальное выравнивание

for i in range(2):
    for tick in ax[i].yaxis.get_major_ticks():
        tick.label1.set_color(color[i])


#  Заголовки областей Axes:
    ax[i].set_title(title[i], fontsize=title_fontsize, color=color[i])
# ax[0].set_title('Количество покупок', fontsize=12, color = 'b')
# ax[1].set_title('Денежные затраты', fontsize=12, color = 'r')

# Заголовки осей:
    ax[i].set_xlabel(x_label, fontsize=label_fontsize, color=color[i])
    ax[i].set_ylabel(y_label[i], fontsize=label_fontsize, color=color[i])
# ax[0].set_xlabel('Категории товаров', fontsize=10, color = 'b')
# ax[0].set_ylabel('Количество покупок, шт.', fontsize=10, color = 'b')
# ax[1].set_xlabel('Категории товаров', fontsize=10, color = 'r')
# ax[1].set_ylabel('Денежные затраты, руб.', fontsize=10, color = 'r')

# annotation here
    for p in ax[i].patches:
        ax[i].annotate("%.0f" % p.get_height(), (p.get_x() + p.get_width() / 2., p.get_height()),
                       ha='center', va='bottom', fontsize=10, color=color[i], xytext=(0, 5), rotation = 50,
                       textcoords='offset points')

# for p in ax[1].patches:
#              ax[1].annotate("%.0f" % p.get_height(), (p.get_x() + p.get_width() / 2., p.get_height()),
#                             ha='center', va='bottom', fontsize=10, color='r', xytext=(0, 5), rotation = 50,
#                             textcoords='offset points')
#plt.grid(True)
#plt.show()
#fig.savefig('blocks/python/plots/hist.png')
fig.savefig('blocks/python/plots/hist.png', bbox_inches = 'tight')
# --------------------------------------------
# Plot_1 END
# --------------------------------------------
