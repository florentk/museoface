#!/usr/bin/env python3
# -*- coding: utf-8 -*-

# author : Florent Kaisser <florent@kaisser.name>
# maintainer : Museomix

import gi
import signal
gi.require_version('Gtk', '3.0')
from gi.repository import Gtk, GLib, Gdk
from subprocess import call

class EntryWindow(Gtk.Window):

    def __init__(self):
        Gtk.Window.__init__(self, title="Entry Demo")
        self.set_size_request(800, 600)

        self.timeout_id = None

        vbox = Gtk.Box(orientation=Gtk.Orientation.VERTICAL, spacing=6)
        self.add(vbox)

        self.entry = Gtk.Entry()
        self.label = Gtk.Label("Ton adresse e-mail : ")
        self.entry.set_text("")
        self.entry.connect("key-release-event", self.on_key_release)
        vbox.pack_start(self.label, False, False, 0)
        vbox.pack_start(self.entry, False, False, 0)
        

        hbox = Gtk.Box(spacing=6)
        vbox.pack_start(hbox, False, False, 0)

        self.ok = Gtk.Button("Ok !")
        self.ok.connect("clicked", self.on_ok)
        hbox.pack_start(self.ok, True, True, 0)

    def start_capture(self):
      email =  self.entry.get_text()
      self.entry.set_text("")
      call(["./capture2.py", email])
      

    def on_ok(self, button):
        self.start_capture()
    def on_key_release(self, widget, ev, data=None):
        if ev.keyval == Gdk.KEY_Return:
          self.start_capture()

    
signal.signal(signal.SIGINT, signal.SIG_DFL)

win = EntryWindow()
win.connect("destroy", Gtk.main_quit)
win.show_all()
Gtk.main()
