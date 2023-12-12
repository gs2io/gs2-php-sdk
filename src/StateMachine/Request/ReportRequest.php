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

namespace Gs2\StateMachine\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\StateMachine\Model\ChangeStateEvent;
use Gs2\StateMachine\Model\EmitEvent;
use Gs2\StateMachine\Model\Event;

class ReportRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $statusName;
    /** @var array */
    private $events;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): ReportRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): ReportRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getStatusName(): ?string {
		return $this->statusName;
	}
	public function setStatusName(?string $statusName) {
		$this->statusName = $statusName;
	}
	public function withStatusName(?string $statusName): ReportRequest {
		$this->statusName = $statusName;
		return $this;
	}
	public function getEvents(): ?array {
		return $this->events;
	}
	public function setEvents(?array $events) {
		$this->events = $events;
	}
	public function withEvents(?array $events): ReportRequest {
		$this->events = $events;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ReportRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ReportRequest {
        if ($data === null) {
            return null;
        }
        return (new ReportRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withStatusName(array_key_exists('statusName', $data) && $data['statusName'] !== null ? $data['statusName'] : null)
            ->withEvents(array_map(
                function ($item) {
                    return Event::fromJson($item);
                },
                array_key_exists('events', $data) && $data['events'] !== null ? $data['events'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "statusName" => $this->getStatusName(),
            "events" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getEvents() !== null && $this->getEvents() !== null ? $this->getEvents() : []
            ),
        );
    }
}