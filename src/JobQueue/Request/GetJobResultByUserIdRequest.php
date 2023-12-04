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

class GetJobResultByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $jobName;
    /** @var int */
    private $tryNumber;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetJobResultByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): GetJobResultByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getJobName(): ?string {
		return $this->jobName;
	}
	public function setJobName(?string $jobName) {
		$this->jobName = $jobName;
	}
	public function withJobName(?string $jobName): GetJobResultByUserIdRequest {
		$this->jobName = $jobName;
		return $this;
	}
	public function getTryNumber(): ?int {
		return $this->tryNumber;
	}
	public function setTryNumber(?int $tryNumber) {
		$this->tryNumber = $tryNumber;
	}
	public function withTryNumber(?int $tryNumber): GetJobResultByUserIdRequest {
		$this->tryNumber = $tryNumber;
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
            ->withTryNumber(array_key_exists('tryNumber', $data) && $data['tryNumber'] !== null ? $data['tryNumber'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "jobName" => $this->getJobName(),
            "tryNumber" => $this->getTryNumber(),
        );
    }
}