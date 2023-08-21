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

namespace Gs2\Log\Model;

use Gs2\Core\Model\IModel;


class Insight implements IModel {
	/**
     * @var string
	 */
	private $insightId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $taskId;
	/**
     * @var string
	 */
	private $host;
	/**
     * @var string
	 */
	private $password;
	/**
     * @var string
	 */
	private $status;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $revision;
	public function getInsightId(): ?string {
		return $this->insightId;
	}
	public function setInsightId(?string $insightId) {
		$this->insightId = $insightId;
	}
	public function withInsightId(?string $insightId): Insight {
		$this->insightId = $insightId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Insight {
		$this->name = $name;
		return $this;
	}
	public function getTaskId(): ?string {
		return $this->taskId;
	}
	public function setTaskId(?string $taskId) {
		$this->taskId = $taskId;
	}
	public function withTaskId(?string $taskId): Insight {
		$this->taskId = $taskId;
		return $this;
	}
	public function getHost(): ?string {
		return $this->host;
	}
	public function setHost(?string $host) {
		$this->host = $host;
	}
	public function withHost(?string $host): Insight {
		$this->host = $host;
		return $this;
	}
	public function getPassword(): ?string {
		return $this->password;
	}
	public function setPassword(?string $password) {
		$this->password = $password;
	}
	public function withPassword(?string $password): Insight {
		$this->password = $password;
		return $this;
	}
	public function getStatus(): ?string {
		return $this->status;
	}
	public function setStatus(?string $status) {
		$this->status = $status;
	}
	public function withStatus(?string $status): Insight {
		$this->status = $status;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Insight {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Insight {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Insight {
        if ($data === null) {
            return null;
        }
        return (new Insight())
            ->withInsightId(array_key_exists('insightId', $data) && $data['insightId'] !== null ? $data['insightId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withTaskId(array_key_exists('taskId', $data) && $data['taskId'] !== null ? $data['taskId'] : null)
            ->withHost(array_key_exists('host', $data) && $data['host'] !== null ? $data['host'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "insightId" => $this->getInsightId(),
            "name" => $this->getName(),
            "taskId" => $this->getTaskId(),
            "host" => $this->getHost(),
            "password" => $this->getPassword(),
            "status" => $this->getStatus(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}