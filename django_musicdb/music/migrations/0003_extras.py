# Generated by Django 4.0.3 on 2022-03-10 20:36

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('music', '0002_artists'),
    ]

    operations = [
        migrations.CreateModel(
            name='Extras',
            fields=[
                ('genre', models.CharField(max_length=200, primary_key=True, serialize=False)),
                ('album', models.CharField(max_length=200)),
                ('year', models.IntegerField()),
            ],
        ),
    ]
