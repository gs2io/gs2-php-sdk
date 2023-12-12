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


class ChangeStateEvent implements IModel {
	/**
     * @var string
	 */
	private $taskName;
	/**
     * @var string
	 */
	private $hash;
	/**
     * @var int
	 */
	private $timestamp;
	public function getTaskName(): ?string {
		return $this->taskName;
	}
	public function setTaskName(?string $taskName) {
		$this->taskName = $taskName;
	}
	public function withTaskName(?string $taskName): ChangeStateEvent {
		$this->taskName = $taskName;
		return $this;
	}
	public function getHash(): ?string {
		return $this->hash;
	}
	public function setHash(?string $hash) {
		$this->hash = $hash;
	}
	public function withHash(?string $hash): ChangeStateEvent {
		$this->hash = $hash;
		return $this;
	}
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
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