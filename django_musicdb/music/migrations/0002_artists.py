# Generated by Django 4.0.3 on 2022-03-10 20:01

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('music', '0001_initial'),
    ]

    operations = [
        migrations.CreateModel(
            name='Artists',
            fields=[
                ('song', models.CharField(max_length=200, primary_key=True, serialize=False)),
                ('artist', models.CharField(max_length=100)),
            ],
        ),
    ]