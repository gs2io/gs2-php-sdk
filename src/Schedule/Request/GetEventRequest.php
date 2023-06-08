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

class GetEventRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $eventName;
    /** @var string */
    private $accessToken;
    /** @var bool */
    private $isInSchedule;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetEventRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getEventName(): ?string {
		return $this->eventName;
	}
	public function setEventName(?string $eventName) {
		$this->eventName = $eventName;
	}
	public function withEventName(?string $eventName): GetEventRequest {
		$this->eventName = $eventName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): GetEventRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getIsInSchedule(): ?bool {
		return $this->isInSchedule;
	}
	public function setIsInSchedule(?bool $isInSchedule) {
		$this->isInSchedule = $isInSchedule;
	}
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