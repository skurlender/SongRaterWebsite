# DJANGO README
MAKE SURE YOU ARE IN THE DJANGO-MUSICDB directory, this is where __manage.py__ is located.
After we create our models, housed within __models.py__, you must run these two commands in this order:
1) `python3 manage.py makemigrations`
2) `python3 manage.py migrate`
Awesome.
Now, run `python3 manage.py shell`
Write the following:

```python
>>> from music.models import Users, Ratings, Artists, Info

>>> a = Users(username = "Amelia-Earhart", password = "Youaom139&yu7")
>>> a.save()
>>> b = Users(username = "Otto", password = "StarWars2*")
>>> b.save()

>>> c = Ratings(id = 1, username = "Amelia-Earhart", song = "Freeway", rating = 3)
>>> c.save()
>>> d = Ratings(id = 2, username = "Amelia-Earhart", song = "Days of Wine and Roses", rating = 4)
>>> d.save()
>>> e = Ratings(id = 3, username = "Otto", song = "Days of Wine and Roses", rating = 5)
>>> e.save()
>>> f = Ratings(id = 4, username = "Amelia-Earhart", song = "These Walls", rating = 4)
>>> f.save()

>>> b = Artists(song = "Freeway", artist = "Aimee Mann")
>>> b.save()
>>> v = Artists(song = "Days of Wine and Roses", artist = "Bill Evans")
>>> v.save()
>>> c = Artists(song = "These Walls", artist = "Kendrick Lamar")
>>> c.save()

>>> a = Info(song = 'Freeway', genre = 'Alternative/Indie', album = 'Fucking Smilers', year = 2008)
>>> a.save()
>>> b = Info(song = 'Days of Wine and Roses', genre = 'Easy listening', album = 'Days of Wine and Roses', year = 1963)
>>> b.save()
>>> c = Info(song = 'These Walls', genre = 'Progressive rap', album = 'To Pimp a Butterfly', year = 2015)
>>> c.save()
```
Yay!
Now just type in `python3 manage.py runserver` and go to 'http://127.0.0.1:8000/' or whatever link you are given.
