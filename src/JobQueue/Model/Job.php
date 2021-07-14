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

namespace Gs2\JobQueue\Model;

use Gs2\Core\Model\IModel;


class Job implements IModel {
	/**
     * @var string
	 */
	private $jobId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $scriptId;
	/**
     * @var string
	 */
	private $args;
	/**
     * @var int
	 */
	private $currentRetryCount;
	/**
     * @var int
	 */
	private $maxTryCount;
	/**
     * @var float
	 */
	private $index;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getJobId(): ?string {
		return $this->jobId;
	}

	public function setJobId(?string $jobId) {
		$this->jobId = $jobId;
	}

	public function withJobId(?string $jobId): Job {
		$this->jobId = $jobId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Job {
		$this->name = $name;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Job {
		$this->userId = $userId;
		return $this;
	}

	public function getScriptId(): ?string {
		return $this->scriptId;
	}

	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}

	public function withScriptId(?string $scriptId): Job {
		$this->scriptId = $scriptId;
		return $this;
	}

	public function getArgs(): ?string {
		return $this->args;
	}

	public function setArgs(?string $args) {
		$this->args = $args;
	}

	public function withArgs(?string $args): Job {
		$this->args = $args;
		return $this;
	}

	public function getCurrentRetryCount(): ?int {
		return $this->currentRetryCount;
	}

	public function setCurrentRetryCount(?int $currentRetryCount) {
		$this->currentRetryCount = $currentRetryCount;
	}

	public function withCurrentRetryCount(?int $currentRetryCount): Job {
		$this->currentRetryCount = $currentRetryCount;
		return $this;
	}

	public function getMaxTryCount(): ?int {
		return $this->maxTryCount;
	}

	public function setMaxTryCount(?int $maxTryCount) {
		$this->maxTryCount = $maxTryCount;
	}

	public function withMaxTryCount(?int $maxTryCount): Job {
		$this->maxTryCount = $maxTryCount;
		return $this;
	}

	public function getIndex(): ?float {
		return $this->index;
	}

	public function setIndex(?float $index) {
		$this->index = $index;
	}

	public function withIndex(?float $index): Job {
		$this->index = $index;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Job {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Job {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Job {
        if ($data === null) {
            return null;
        }
        return (new Job())
            ->withJobId(empty($data['jobId']) ? null : $data['jobId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withScriptId(empty($data['scriptId']) ? null : $data['scriptId'])
            ->withArgs(empty($data['args']) ? null : $data['args'])
            ->withCurrentRetryCount(empty($data['currentRetryCount']) ? null : $data['currentRetryCount'])
            ->withMaxTryCount(empty($data['maxTryCount']) ? null : $data['maxTryCount'])
            ->withIndex(empty($data['index']) ? null : $data['index'])
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "jobId" => $this->getJobId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "scriptId" => $this->getScriptId(),
            "args" => $this->getArgs(),
            "currentRetryCount" => $this->getCurrentRetryCount(),
            "maxTryCount" => $this->getMaxTryCount(),
            "index" => $this->getIndex(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}