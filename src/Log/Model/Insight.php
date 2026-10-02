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


/**
 * GS2-Insight is a tool for visualizing and analyzing access logs stored in GS2-Log.
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#insight
 */
class Insight implements IModel {
	/**
     * @var string GS2-Insight GRN
	 */
	private $insightId;
	/**
     * @var string Name
	 */
	private $name;
	/**
     * @var string Task ID
	 */
	private $taskId;
	/**
     * @var string Host Name
	 */
	private $host;
	/**
     * @var string Password
	 */
	private $password;
	/**
     * @var string Status
	 */
	private $status;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null GS2-Insight GRN */
	public function getInsightId(): ?string {
		return $this->insightId;
	}
    /** @param string|null $insightId GS2-Insight GRN */
	public function setInsightId(?string $insightId) {
		$this->insightId = $insightId;
	}
    /**
     * @param string|null $insightId GS2-Insight GRN
     * @return Insight
     */
	public function withInsightId(?string $insightId): Insight {
		$this->insightId = $insightId;
		return $this;
	}
    /** @return string|null Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Name
     * @return Insight
     */
	public function withName(?string $name): Insight {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Task ID */
	public function getTaskId(): ?string {
		return $this->taskId;
	}
    /** @param string|null $taskId Task ID */
	public function setTaskId(?string $taskId) {
		$this->taskId = $taskId;
	}
    /**
     * @param string|null $taskId Task ID
     * @return Insight
     */
	public function withTaskId(?string $taskId): Insight {
		$this->taskId = $taskId;
		return $this;
	}
    /** @return string|null Host Name */
	public function getHost(): ?string {
		return $this->host;
	}
    /** @param string|null $host Host Name */
	public function setHost(?string $host) {
		$this->host = $host;
	}
    /**
     * @param string|null $host Host Name
     * @return Insight
     */
	public function withHost(?string $host): Insight {
		$this->host = $host;
		return $this;
	}
    /** @return string|null Password */
	public function getPassword(): ?string {
		return $this->password;
	}
    /** @param string|null $password Password */
	public function setPassword(?string $password) {
		$this->password = $password;
	}
    /**
     * @param string|null $password Password
     * @return Insight
     */
	public function withPassword(?string $password): Insight {
		$this->password = $password;
		return $this;
	}
    /** @return string|null Status */
	public function getStatus(): ?string {
		return $this->status;
	}
    /** @param string|null $status Status */
	public function setStatus(?string $status) {
		$this->status = $status;
	}
    /**
     * @param string|null $status Status
     * @return Insight
     */
	public function withStatus(?string $status): Insight {
		$this->status = $status;
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
     * @return Insight
     */
	public function withCreatedAt(?int $createdAt): Insight {
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
     * @return Insight
     */
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