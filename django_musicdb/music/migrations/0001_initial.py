# Generated by Django 4.0.3 on 2022-03-10 19:39

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Ratings',
            fields=[
                ('id', models.IntegerField(primary_key=True, serialize=False)),
                ('username', models.CharField(max_length=200)),
                ('song', models.CharField(max_length=200)),
                ('rating', models.IntegerField()),
            ],
        ),
        migrations.CreateModel(
            name='Users',
            fields=[
                ('username', models.CharField(max_length=200, primary_key=True, serialize=False)),
                ('password', models.CharField(max_length=200)),
            ],
        ),
    ]