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


/**
 * Job
 *
 * @see https://docs.gs2.io/api_reference/job_queue/sdk/#job
 */
class Job implements IModel {
	/**
     * @var string Job GRN
	 */
	private $jobId;
	/**
     * @var string Job Name
	 */
	private $name;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Script GRN
	 */
	private $scriptId;
	/**
     * @var string Argument
	 */
	private $args;
	/**
     * @var int Current Retry Count
	 */
	private $currentRetryCount;
	/**
     * @var int Maximum Number of Attempts
	 */
	private $maxTryCount;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
    /** @return string|null Job GRN */
	public function getJobId(): ?string {
		return $this->jobId;
	}
    /** @param string|null $jobId Job GRN */
	public function setJobId(?string $jobId) {
		$this->jobId = $jobId;
	}
    /**
     * @param string|null $jobId Job GRN
     * @return Job
     */
	public function withJobId(?string $jobId): Job {
		$this->jobId = $jobId;
		return $this;
	}
    /** @return string|null Job Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Job Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Job Name
     * @return Job
     */
	public function withName(?string $name): Job {
		$this->name = $name;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return Job
     */
	public function withUserId(?string $userId): Job {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Script GRN */
	public function getScriptId(): ?string {
		return $this->scriptId;
	}
    /** @param string|null $scriptId Script GRN */
	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}
    /**
     * @param string|null $scriptId Script GRN
     * @return Job
     */
	public function withScriptId(?string $scriptId): Job {
		$this->scriptId = $scriptId;
		return $this;
	}
    /** @return string|null Argument */
	public function getArgs(): ?string {
		return $this->args;
	}
    /** @param string|null $args Argument */
	public function setArgs(?string $args) {
		$this->args = $args;
	}
    /**
     * @param string|null $args Argument
     * @return Job
     */
	public function withArgs(?string $args): Job {
		$this->args = $args;
		return $this;
	}
    /** @return int|null Current Retry Count */
	public function getCurrentRetryCount(): ?int {
		return $this->currentRetryCount;
	}
    /** @param int|null $currentRetryCount Current Retry Count */
	public function setCurrentRetryCount(?int $currentRetryCount) {
		$this->currentRetryCount = $currentRetryCount;
	}
    /**
     * @param int|null $currentRetryCount Current Retry Count
     * @return Job
     */
	public function withCurrentRetryCount(?int $currentRetryCount): Job {
		$this->currentRetryCount = $currentRetryCount;
		return $this;
	}
    /** @return int|null Maximum Number of Attempts */
	public function getMaxTryCount(): ?int {
		return $this->maxTryCount;
	}
    /** @param int|null $maxTryCount Maximum Number of Attempts */
	public function setMaxTryCount(?int $maxTryCount) {
		$this->maxTryCount = $maxTryCount;
	}
    /**
     * @param int|null $maxTryCount Maximum Number of Attempts
     * @return Job
     */
	public function withMaxTryCount(?int $maxTryCount): Job {
		$this->maxTryCount = $maxTryCount;
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
     * @return Job
     */
	public function withCreatedAt(?int $createdAt): Job {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Job
     */
	public function withUpdatedAt(?int $updatedAt): Job {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Job {
        if ($data === null) {
            return null;
        }
        return (new Job())
            ->withJobId(array_key_exists('jobId', $data) && $data['jobId'] !== null ? $data['jobId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withScriptId(array_key_exists('scriptId', $data) && $data['scriptId'] !== null ? $data['scriptId'] : null)
            ->withArgs(array_key_exists('args', $data) && $data['args'] !== null ? $data['args'] : null)
            ->withCurrentRetryCount(array_key_exists('currentRetryCount', $data) && $data['currentRetryCount'] !== null ? $data['currentRetryCount'] : null)
            ->withMaxTryCount(array_key_exists('maxTryCount', $data) && $data['maxTryCount'] !== null ? $data['maxTryCount'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}