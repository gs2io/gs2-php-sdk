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


class ImportErrorLog implements IModel {
	/**
     * @var string
	 */
	private $dumpProgressId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $microserviceName;
	/**
     * @var string
	 */
	private $message;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $revision;
	public function getDumpProgressId(): ?string {
		return $this->dumpProgressId;
	}
	public function setDumpProgressId(?string $dumpProgressId) {
		$this->dumpProgressId = $dumpProgressId;
	}
	public function withDumpProgressId(?string $dumpProgressId): ImportErrorLog {
		$this->dumpProgressId = $dumpProgressId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): ImportErrorLog {
		$this->name = $name;
		return $this;
	}
	public function getMicroserviceName(): ?string {
		return $this->microserviceName;
	}
	public function setMicroserviceName(?string $microserviceName) {
		$this->microserviceName = $microserviceName;
	}
	public function withMicroserviceName(?string $microserviceName): ImportErrorLog {
		$this->microserviceName = $microserviceName;
		return $this;
	}
	public function getMessage(): ?string {
		return $this->message;
	}
	public function setMessage(?string $message) {
		$this->message = $message;
	}
	public function withMessage(?string $message): ImportErrorLog {
		$this->message = $message;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): ImportErrorLog {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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