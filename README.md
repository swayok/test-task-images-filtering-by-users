# Запуск с нуля
```
git clone https://github.com/swayok/test-task-images-filtering-by-users.git
chmod a+x *.sh
./deploy.sh
```
# Запуск установленного

```
./start.sh
```

# Админка

```
http://localhost/admin?token=xyz123
```

# Примечания

- Я не уверен что будет работать под нормальным Linux т.к. проверить могу только 
под Windows (WSL2 + Docker Desktop).
- Есть вероятность что картинка не будет отображаться из-за того что её нет на 
стороне picsum.photos - оказалось что там есть пропуски в последовательности значений ID.
- Задание без учёта настройки докера заняло прмерно 4.5 часа.
- С написанием `docker-compose.yml` ранее не сталкивался, поэтому изучал этот процесс 
на ходу. Cтратовал с помощью Laravel Sail, который потом убрал т.к. там не оказалось nginx. 
Заняло это где-то 4-5 часов. 
