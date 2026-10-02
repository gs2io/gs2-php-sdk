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
 * Request for getJobResult: Get Job Execution Result
 *
 * @see https://docs.gs2.io/api_reference/job_queue/sdk/#getjobresult
 */
class GetJobResultRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Job Name */
    private $jobName;
    /** @var int Number of attempts */
    private $tryNumber;
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
     * @return GetJobResultRequest
     */
	public function withNamespaceName(?string $namespaceName): GetJobResultRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return GetJobResultRequest
     */
	public function withAccessToken(?string $accessToken): GetJobResultRequest {
		$this->accessToken = $accessToken;
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
     * @return GetJobResultRequest
     */
	public function withJobName(?string $jobName): GetJobResultRequest {
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
     * @return GetJobResultRequest
     */
	public function withTryNumber(?int $tryNumber): GetJobResultRequest {
		$this->tryNumber = $tryNumber;
		return $this;
	}

    public static function fromJson(?array $data): ?GetJobResultRequest {
        if ($data === null) {
            return null;
        }
        return (new GetJobResultRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withJobName(array_key_exists('jobName', $data) && $data['jobName'] !== null ? $data['jobName'] : null)
            ->withTryNumber(array_key_exists('tryNumber', $data) && $data['tryNumber'] !== null ? $data['tryNumber'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "jobName" => $this->getJobName(),
            "tryNumber" => $this->getTryNumber(),
        );
    }
}