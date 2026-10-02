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
 * Request for verifyEvent: Verify if it is the event period
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#verifyevent
 */
class VerifyEventRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Event name */
    private $eventName;
    /** @var string Type of verification */
    private $verifyType;
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
     * @return VerifyEventRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyEventRequest {
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
     * @return VerifyEventRequest
     */
	public function withAccessToken(?string $accessToken): VerifyEventRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Event name */
	public function getEventName(): ?string {
		return $this->eventName;
	}
    /** @param string|null $eventName Event name */
	public function setEventName(?string $eventName) {
		$this->eventName = $eventName;
	}
    /**
     * @param string|null $eventName Event name
     * @return VerifyEventRequest
     */
	public function withEventName(?string $eventName): VerifyEventRequest {
		$this->eventName = $eventName;
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
     * @return VerifyEventRequest
     */
	public function withVerifyType(?string $verifyType): VerifyEventRequest {
		$this->verifyType = $verifyType;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyEventRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyEventRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyEventRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withEventName(array_key_exists('eventName', $data) && $data['eventName'] !== null ? $data['eventName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "eventName" => $this->getEventName(),
            "verifyType" => $this->getVerifyType(),
        );
    }
}