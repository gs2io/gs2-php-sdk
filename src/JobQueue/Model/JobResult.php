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


class JobResult implements IModel {
	/**
     * @var string
	 */
	private $jobResultId;
	/**
     * @var string
	 */
	private $jobId;
	/**
     * @var int
	 */
	private $tryNumber;
	/**
     * @var int
	 */
	private $statusCode;
	/**
     * @var string
	 */
	private $result;
	/**
     * @var int
	 */
	private $tryAt;

	public function getJobResultId(): ?string {
		return $this->jobResultId;
	}

	public function setJobResultId(?string $jobResultId) {
		$this->jobResultId = $jobResultId;
	}

	public function withJobResultId(?string $jobResultId): JobResult {
		$this->jobResultId = $jobResultId;
		return $this;
	}

	public function getJobId(): ?string {
		return $this->jobId;
	}

	public function setJobId(?string $jobId) {
		$this->jobId = $jobId;
	}

	public function withJobId(?string $jobId): JobResult {
		$this->jobId = $jobId;
		return $this;
	}

	public function getTryNumber(): ?int {
		return $this->tryNumber;
	}

	public function setTryNumber(?int $tryNumber) {
		$this->tryNumber = $tryNumber;
	}

	public function withTryNumber(?int $tryNumber): JobResult {
		$this->tryNumber = $tryNumber;
		return $this;
	}

	public function getStatusCode(): ?int {
		return $this->statusCode;
	}

	public function setStatusCode(?int $statusCode) {
		$this->statusCode = $statusCode;
	}

	public function withStatusCode(?int $statusCode): JobResult {
		$this->statusCode = $statusCode;
		return $this;
	}

	public function getResult(): ?string {
		return $this->result;
	}

	public function setResult(?string $result) {
		$this->result = $result;
	}

	public function withResult(?string $result): JobResult {
		$this->result = $result;
		return $this;
	}

	public function getTryAt(): ?int {
		return $this->tryAt;
	}

	public function setTryAt(?int $tryAt) {
		$this->tryAt = $tryAt;
	}

	public function withTryAt(?int $tryAt): JobResult {
		$this->tryAt = $tryAt;
		return $this;
	}

    public static function fromJson(?array $data): ?JobResult {
        if ($data === null) {
            return null;
        }
        return (new JobResult())
            ->withJobResultId(empty($data['jobResultId']) ? null : $data['jobResultId'])
            ->withJobId(empty($data['jobId']) ? null : $data['jobId'])
            ->withTryNumber(empty($data['tryNumber']) ? null : $data['tryNumber'])
            ->withStatusCode(empty($data['statusCode']) ? null : $data['statusCode'])
            ->withResult(empty($data['result']) ? null : $data['result'])
            ->withTryAt(empty($data['tryAt']) ? null : $data['tryAt']);
    }

    public function toJson(): array {
        return array(
            "jobResultId" => $this->getJobResultId(),
            "jobId" => $this->getJobId(),
            "tryNumber" => $this->getTryNumber(),
            "statusCode" => $this->getStatusCode(),
            "result" => $this->getResult(),
            "tryAt" => $this->getTryAt(),
        );
    }
}