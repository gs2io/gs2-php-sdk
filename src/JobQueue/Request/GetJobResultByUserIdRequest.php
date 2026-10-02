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

namespace Gs2\JobQueue\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getJobResultByUserId: Get job execution result by User ID
 *
 * @see https://docs.gs2.io/api_reference/job_queue/sdk/#getjobresultbyuserid
 */
class GetJobResultByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Job Name */
    private $jobName;
    /** @var int Number of attempts */
    private $tryNumber;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return GetJobResultByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetJobResultByUserIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return GetJobResultByUserIdRequest
     */
	public function withUserId(?string $userId): GetJobResultByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Job Name */
	public function getJobName(): ?string {
		return $this->jobName;
	}
    /** @param string|null $jobName Job Name */
	public function setJobName(?string $jobName) {
		$this->jobName = $jobName;
	}
    /**
     * @param string|null $jobName Job Name
     * @return GetJobResultByUserIdRequest
     */
	public function withJobName(?string $jobName): GetJobResultByUserIdRequest {
		$this->jobName = $jobName;
		return $this;
	}
    /** @return int|null Number of attempts */
	public function getTryNumber(): ?int {
		return $this->tryNumber;
	}
    /** @param int|null $tryNumber Number of attempts */
	public function setTryNumber(?int $tryNumber) {
		$this->tryNumber = $tryNumber;
	}
    /**
     * @param int|null $tryNumber Number of attempts
     * @return GetJobResultByUserIdRequest
     */
	public function withTryNumber(?int $tryNumber): GetJobResultByUserIdRequest {
		$this->tryNumber = $tryNumber;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return GetJobResultByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetJobResultByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetJobResultByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetJobResultByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withJobName(array_key_exists('jobName', $data) && $data['jobName'] !== null ? $data['jobName'] : null)
            ->withTryNumber(array_key_exists('tryNumber', $data) && $data['tryNumber'] !== null ? $data['tryNumber'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "jobName" => $this->getJobName(),
            "tryNumber" => $this->getTryNumber(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}