.. include:: /Includes.rst.txt

=============
Configuration
=============

.. contents:: On this page
   :local:
   :depth: 2

TypoScript Constants
====================

.. confval:: plugin.tx_dveducationdownloads.persistence.storagePid

   :type: int
   :Default: (empty)

   UID of the sysfolder containing download records and document types.

Plugin
======

**DownloadList** (CType: ``dveducationdownloads_downloadlist``) — table view
with search, document type filter, and language filter. Non-cacheable (POST).

Backend record tabs
===================

- **General** — title, description, document type, file
- **Metadata** — language, version, valid from, valid until
- **Access** — hidden, starttime, endtime
