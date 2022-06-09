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
	public function getScriptId(): ?string {
		return $this->scriptId;
	}
	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}
	public function withScriptId(?string $scriptId): JobResult {
		$this->scriptId = $scriptId;
		return $this;
	}
	public function getArgs(): ?string {
		return $this->args;
	}
	public function setArgs(?string $args) {
		$this->args = $args;
	}
	public function withArgs(?string $args): JobResult {
		$this->args = $args;
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
            ->withJobResultId(array_key_exists('jobResultId', $data) && $data['jobResultId'] !== null ? $data['jobResultId'] : null)
            ->withJobId(array_key_exists('jobId', $data) && $data['jobId'] !== null ? $data['jobId'] : null)
            ->withScriptId(array_key_exists('scriptId', $data) && $data['scriptId'] !== null ? $data['scriptId'] : null)
            ->withArgs(array_key_exists('args', $data) && $data['args'] !== null ? $data['args'] : null)
            ->withTryNumber(array_key_exists('tryNumber', $data) && $data['tryNumber'] !== null ? $data['tryNumber'] : null)
            ->withStatusCode(array_key_exists('statusCode', $data) && $data['statusCode'] !== null ? $data['statusCode'] : null)
            ->withResult(array_key_exists('result', $data) && $data['result'] !== null ? $data['result'] : null)
            ->withTryAt(array_key_exists('tryAt', $data) && $data['tryAt'] !== null ? $data['tryAt'] : null);
    }

    public function toJson(): array {
        return array(
            "jobResultId" => $this->getJobResultId(),
            "jobId" => $this->getJobId(),
            "scriptId" => $this->getScriptId(),
            "args" => $this->getArgs(),
            "tryNumber" => $this->getTryNumber(),
            "statusCode" => $this->getStatusCode(),
            "result" => $this->getResult(),
            "tryAt" => $this->getTryAt(),
        );
    }
}