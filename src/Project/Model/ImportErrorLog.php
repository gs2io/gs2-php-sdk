<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Project\Model;

use Gs2\Core\Model\IModel;


/** Error log that occurred during import processing */
class ImportErrorLog implements IModel {
	/**
     * @var string Import User Data Error Log GRN
	 */
	private $dumpProgressId;
	/**
     * @var string Log name
	 */
	private $name;
	/**
     * @var string Microservice name
	 */
	private $microserviceName;
	/**
     * @var string Error message
	 */
	private $message;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Import User Data Error Log GRN */
	public function getDumpProgressId(): ?string {
		return $this->dumpProgressId;
	}
    /** @param string|null $dumpProgressId Import User Data Error Log GRN */
	public function setDumpProgressId(?string $dumpProgressId) {
		$this->dumpProgressId = $dumpProgressId;
	}
    /**
     * @param string|null $dumpProgressId Import User Data Error Log GRN
     * @return ImportErrorLog
     */
	public function withDumpProgressId(?string $dumpProgressId): ImportErrorLog {
		$this->dumpProgressId = $dumpProgressId;
		return $this;
	}
    /** @return string|null Log name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Log name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Log name
     * @return ImportErrorLog
     */
	public function withName(?string $name): ImportErrorLog {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Microservice name */
	public function getMicroserviceName(): ?string {
		return $this->microserviceName;
	}
    /** @param string|null $microserviceName Microservice name */
	public function setMicroserviceName(?string $microserviceName) {
		$this->microserviceName = $microserviceName;
	}
    /**
     * @param string|null $microserviceName Microservice name
     * @return ImportErrorLog
     */
	public function withMicroserviceName(?string $microserviceName): ImportErrorLog {
		$this->microserviceName = $microserviceName;
		return $this;
	}
    /** @return string|null Error message */
	public function getMessage(): ?string {
		return $this->message;
	}
    /** @param string|null $message Error message */
	public function setMessage(?string $message) {
		$this->message = $message;
	}
    /**
     * @param string|null $message Error message
     * @return ImportErrorLog
     */
	public function withMessage(?string $message): ImportErrorLog {
		$this->message = $message;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return ImportErrorLog
     */
	public function withCreatedAt(?int $createdAt): ImportErrorLog {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return ImportErrorLog
     */
	public function withRevision(?int $revision): ImportErrorLog {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?ImportErrorLog {
        if ($data === null) {
            return null;
        }
        return (new ImportErrorLog())
            ->withDumpProgressId(array_key_exists('dumpProgressId', $data) && $data['dumpProgressId'] !== null ? $data['dumpProgressId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMicroserviceName(array_key_exists('microserviceName', $data) && $data['microserviceName'] !== null ? $data['microserviceName'] : null)
            ->withMessage(array_key_exists('message', $data) && $data['message'] !== null ? $data['message'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "dumpProgressId" => $this->getDumpProgressId(),
            "name" => $this->getName(),
            "microserviceName" => $this->getMicroserviceName(),
            "message" => $this->getMessage(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}