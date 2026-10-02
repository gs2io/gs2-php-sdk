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

/**
 * Request for report: Report multiple events to the state machine
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#report
 */
class ReportRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Status name */
    private $statusName;
    /** @var array List of events */
    private $events;
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
     * @return ReportRequest
     */
	public function withNamespaceName(?string $namespaceName): ReportRequest {
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
     * @return ReportRequest
     */
	public function withAccessToken(?string $accessToken): ReportRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Status name */
	public function getStatusName(): ?string {
		return $this->statusName;
	}
    /** @param string|null $statusName Status name */
	public function setStatusName(?string $statusName) {
		$this->statusName = $statusName;
	}
    /**
     * @param string|null $statusName Status name
     * @return ReportRequest
     */
	public function withStatusName(?string $statusName): ReportRequest {
		$this->statusName = $statusName;
		return $this;
	}
    /** @return array|null List of events */
	public function getEvents(): ?array {
		return $this->events;
	}
    /** @param array|null $events List of events */
	public function setEvents(?array $events) {
		$this->events = $events;
	}
    /**
     * @param array|null $events List of events
     * @return ReportRequest
     */
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
            ->withEvents(!array_key_exists('events', $data) || $data['events'] === null ? null : array_map(
                function ($item) {
                    return Event::fromJson($item);
                },
                $data['events']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "statusName" => $this->getStatusName(),
            "events" => $this->getEvents() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getEvents()
            ),
        );
    }
}