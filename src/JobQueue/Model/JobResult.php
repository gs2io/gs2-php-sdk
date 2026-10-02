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
 * Job Execution Result
 *
 * @see https://docs.gs2.io/api_reference/job_queue/sdk/#jobresult
 */
class JobResult implements IModel {
	/**
     * @var string Job Execution Result GRN
	 */
	private $jobResultId;
	/**
     * @var string Job GRN
	 */
	private $jobId;
	/**
     * @var string Script GRN
	 */
	private $scriptId;
	/**
     * @var string Argument
	 */
	private $args;
	/**
     * @var int Try Number
	 */
	private $tryNumber;
	/**
     * @var int Status Code
	 */
	private $statusCode;
	/**
     * @var string Response Content
	 */
	private $result;
	/**
     * @var int Creation Timestamp
	 */
	private $tryAt;
    /** @return string|null Job Execution Result GRN */
	public function getJobResultId(): ?string {
		return $this->jobResultId;
	}
    /** @param string|null $jobResultId Job Execution Result GRN */
	public function setJobResultId(?string $jobResultId) {
		$this->jobResultId = $jobResultId;
	}
    /**
     * @param string|null $jobResultId Job Execution Result GRN
     * @return JobResult
     */
	public function withJobResultId(?string $jobResultId): JobResult {
		$this->jobResultId = $jobResultId;
		return $this;
	}
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
     * @return JobResult
     */
	public function withJobId(?string $jobId): JobResult {
		$this->jobId = $jobId;
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
     * @return JobResult
     */
	public function withScriptId(?string $scriptId): JobResult {
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
     * @return JobResult
     */
	public function withArgs(?string $args): JobResult {
		$this->args = $args;
		return $this;
	}
    /** @return int|null Try Number */
	public function getTryNumber(): ?int {
		return $this->tryNumber;
	}
    /** @param int|null $tryNumber Try Number */
	public function setTryNumber(?int $tryNumber) {
		$this->tryNumber = $tryNumber;
	}
    /**
     * @param int|null $tryNumber Try Number
     * @return JobResult
     */
	public function withTryNumber(?int $tryNumber): JobResult {
		$this->tryNumber = $tryNumber;
		return $this;
	}
    /** @return int|null Status Code */
	public function getStatusCode(): ?int {
		return $this->statusCode;
	}
    /** @param int|null $statusCode Status Code */
	public function setStatusCode(?int $statusCode) {
		$this->statusCode = $statusCode;
	}
    /**
     * @param int|null $statusCode Status Code
     * @return JobResult
     */
	public function withStatusCode(?int $statusCode): JobResult {
		$this->statusCode = $statusCode;
		return $this;
	}
    /** @return string|null Response Content */
	public function getResult(): ?string {
		return $this->result;
	}
    /** @param string|null $result Response Content */
	public function setResult(?string $result) {
		$this->result = $result;
	}
    /**
     * @param string|null $result Response Content
     * @return JobResult
     */
	public function withResult(?string $result): JobResult {
		$this->result = $result;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getTryAt(): ?int {
		return $this->tryAt;
	}
    /** @param int|null $tryAt Creation Timestamp */
	public function setTryAt(?int $tryAt) {
		$this->tryAt = $tryAt;
	}
    /**
     * @param int|null $tryAt Creation Timestamp
     * @return JobResult
     */
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