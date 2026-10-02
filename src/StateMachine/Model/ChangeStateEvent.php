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

namespace Gs2\StateMachine\Model;

use Gs2\Core\Model\IModel;


/**
 * Change state event
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#changestateevent
 */
class ChangeStateEvent implements IModel {
	/**
     * @var string Task name
	 */
	private $taskName;
	/**
     * @var string Hash
	 */
	private $hash;
	/**
     * @var int Timestamp
	 */
	private $timestamp;
    /** @return string|null Task name */
	public function getTaskName(): ?string {
		return $this->taskName;
	}
    /** @param string|null $taskName Task name */
	public function setTaskName(?string $taskName) {
		$this->taskName = $taskName;
	}
    /**
     * @param string|null $taskName Task name
     * @return ChangeStateEvent
     */
	public function withTaskName(?string $taskName): ChangeStateEvent {
		$this->taskName = $taskName;
		return $this;
	}
    /** @return string|null Hash */
	public function getHash(): ?string {
		return $this->hash;
	}
    /** @param string|null $hash Hash */
	public function setHash(?string $hash) {
		$this->hash = $hash;
	}
    /**
     * @param string|null $hash Hash
     * @return ChangeStateEvent
     */
	public function withHash(?string $hash): ChangeStateEvent {
		$this->hash = $hash;
		return $this;
	}
    /** @return int|null Timestamp */
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
    /** @param int|null $timestamp Timestamp */
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
    /**
     * @param int|null $timestamp Timestamp
     * @return ChangeStateEvent
     */
	public function withTimestamp(?int $timestamp): ChangeStateEvent {
		$this->timestamp = $timestamp;
		return $this;
	}

    public static function fromJson(?array $data): ?ChangeStateEvent {
        if ($data === null) {
            return null;
        }
        return (new ChangeStateEvent())
            ->withTaskName(array_key_exists('taskName', $data) && $data['taskName'] !== null ? $data['taskName'] : null)
            ->withHash(array_key_exists('hash', $data) && $data['hash'] !== null ? $data['hash'] : null)
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null);
    }

    public function toJson(): array {
        return array(
            "taskName" => $this->getTaskName(),
            "hash" => $this->getHash(),
            "timestamp" => $this->getTimestamp(),
        );
    }
}