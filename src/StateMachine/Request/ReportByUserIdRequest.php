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
 * Request for reportByUserId: Report multiple events to the state machine by User ID
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#reportbyuserid
 */
class ReportByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Status name */
    private $statusName;
    /** @var array List of events */
    private $events;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return ReportByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): ReportByUserIdRequest {
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
     * @return ReportByUserIdRequest
     */
	public function withUserId(?string $userId): ReportByUserIdRequest {
		$this->userId = $userId;
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
     * @return ReportByUserIdRequest
     */
	public function withStatusName(?string $statusName): ReportByUserIdRequest {
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
     * @return ReportByUserIdRequest
     */
	public function withEvents(?array $events): ReportByUserIdRequest {
		$this->events = $events;
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
     * @return ReportByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): ReportByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ReportByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ReportByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new ReportByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withStatusName(array_key_exists('statusName', $data) && $data['statusName'] !== null ? $data['statusName'] : null)
            ->withEvents(!array_key_exists('events', $data) || $data['events'] === null ? null : array_map(
                function ($item) {
                    return Event::fromJson($item);
                },
                $data['events']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "statusName" => $this->getStatusName(),
            "events" => $this->getEvents() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getEvents()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}