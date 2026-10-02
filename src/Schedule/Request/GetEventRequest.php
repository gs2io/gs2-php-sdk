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
 * Request for getEvent: Get Event
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#getevent
 */
class GetEventRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Event name */
    private $eventName;
    /** @var string User ID */
    private $accessToken;
    /** @var bool Are only current events eligible for acquisition */
    private $isInSchedule;
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
     * @return GetEventRequest
     */
	public function withNamespaceName(?string $namespaceName): GetEventRequest {
		$this->namespaceName = $namespaceName;
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
     * @return GetEventRequest
     */
	public function withEventName(?string $eventName): GetEventRequest {
		$this->eventName = $eventName;
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
     * @return GetEventRequest
     */
	public function withAccessToken(?string $accessToken): GetEventRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return bool|null Are only current events eligible for acquisition */
	public function getIsInSchedule(): ?bool {
		return $this->isInSchedule;
	}
    /** @param bool|null $isInSchedule Are only current events eligible for acquisition */
	public function setIsInSchedule(?bool $isInSchedule) {
		$this->isInSchedule = $isInSchedule;
	}
    /**
     * @param bool|null $isInSchedule Are only current events eligible for acquisition
     * @return GetEventRequest
     */
	public function withIsInSchedule(?bool $isInSchedule): GetEventRequest {
		$this->isInSchedule = $isInSchedule;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEventRequest {
        if ($data === null) {
            return null;
        }
        return (new GetEventRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withEventName(array_key_exists('eventName', $data) && $data['eventName'] !== null ? $data['eventName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withIsInSchedule(array_key_exists('isInSchedule', $data) ? $data['isInSchedule'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "eventName" => $this->getEventName(),
            "accessToken" => $this->getAccessToken(),
            "isInSchedule" => $this->getIsInSchedule(),
        );
    }
}