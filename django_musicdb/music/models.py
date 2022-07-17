from django.db import models
# Create your models here.

class Users(models.Model):
    username = models.CharField(primary_key = True, max_length = 200)
    password = models.CharField(max_length = 200)

    def __str__(self):
        return self.username

class Ratings(models.Model):
    id = models.IntegerField(primary_key = True)
    username = models.CharField(max_length = 200)
    song = models.CharField(max_length = 200)
    rating = models.IntegerField()

class Artists(models.Model):
    song = models.CharField(primary_key = True, max_length = 200)
    artist = models.CharField(max_length = 100)

    def __str__(self):
        return self.artist

class Info(models.Model):
    song = models.CharField(primary_key = True, max_length = 200)
    genre = models.CharField(max_length = 200)
    album = models.CharField(max_length = 200)
    year = models.IntegerField()