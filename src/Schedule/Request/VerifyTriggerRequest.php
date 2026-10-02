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

namespace Gs2\Schedule\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for verifyTrigger: Verify the elapsed time since the trigger was pulled
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#verifytrigger
 */
class VerifyTriggerRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Trigger name */
    private $triggerName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var int Elapsed time (minutes) */
    private $elapsedMinutes;
    /** @var string */
    private $duplicationAvoider;
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
     * @return VerifyTriggerRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyTriggerRequest {
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
     * @return VerifyTriggerRequest
     */
	public function withAccessToken(?string $accessToken): VerifyTriggerRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Trigger name */
	public function getTriggerName(): ?string {
		return $this->triggerName;
	}
    /** @param string|null $triggerName Trigger name */
	public function setTriggerName(?string $triggerName) {
		$this->triggerName = $triggerName;
	}
    /**
     * @param string|null $triggerName Trigger name
     * @return VerifyTriggerRequest
     */
	public function withTriggerName(?string $triggerName): VerifyTriggerRequest {
		$this->triggerName = $triggerName;
		return $this;
	}
    /** @return string|null Type of verification */
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
    /** @param string|null $verifyType Type of verification */
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
    /**
     * @param string|null $verifyType Type of verification
     * @return VerifyTriggerRequest
     */
	public function withVerifyType(?string $verifyType): VerifyTriggerRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return int|null Elapsed time (minutes) */
	public function getElapsedMinutes(): ?int {
		return $this->elapsedMinutes;
	}
    /** @param int|null $elapsedMinutes Elapsed time (minutes) */
	public function setElapsedMinutes(?int $elapsedMinutes) {
		$this->elapsedMinutes = $elapsedMinutes;
	}
    /**
     * @param int|null $elapsedMinutes Elapsed time (minutes)
     * @return VerifyTriggerRequest
     */
	public function withElapsedMinutes(?int $elapsedMinutes): VerifyTriggerRequest {
		$this->elapsedMinutes = $elapsedMinutes;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyTriggerRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyTriggerRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyTriggerRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withTriggerName(array_key_exists('triggerName', $data) && $data['triggerName'] !== null ? $data['triggerName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withElapsedMinutes(array_key_exists('elapsedMinutes', $data) && $data['elapsedMinutes'] !== null ? $data['elapsedMinutes'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "triggerName" => $this->getTriggerName(),
            "verifyType" => $this->getVerifyType(),
            "elapsedMinutes" => $this->getElapsedMinutes(),
        );
    }
}