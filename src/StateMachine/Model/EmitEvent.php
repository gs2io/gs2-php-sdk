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
 * Send a message event
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#emitevent
 */
class EmitEvent implements IModel {
	/**
     * @var string Event name
	 */
	private $event;
	/**
     * @var string Parameters
	 */
	private $parameters;
	/**
     * @var int Timestamp
	 */
	private $timestamp;
    /** @return string|null Event name */
	public function getEvent(): ?string {
		return $this->event;
	}
    /** @param string|null $event Event name */
	public function setEvent(?string $event) {
		$this->event = $event;
	}
    /**
     * @param string|null $event Event name
     * @return EmitEvent
     */
	public function withEvent(?string $event): EmitEvent {
		$this->event = $event;
		return $this;
	}
    /** @return string|null Parameters */
	public function getParameters(): ?string {
		return $this->parameters;
	}
    /** @param string|null $parameters Parameters */
	public function setParameters(?string $parameters) {
		$this->parameters = $parameters;
	}
    /**
     * @param string|null $parameters Parameters
     * @return EmitEvent
     */
	public function withParameters(?string $parameters): EmitEvent {
		$this->parameters = $parameters;
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
     * @return EmitEvent
     */
	public function withTimestamp(?int $timestamp): EmitEvent {
		$this->timestamp = $timestamp;
		return $this;
	}

    public static function fromJson(?array $data): ?EmitEvent {
        if ($data === null) {
            return null;
        }
        return (new EmitEvent())
            ->withEvent(array_key_exists('event', $data) && $data['event'] !== null ? $data['event'] : null)
            ->withParameters(array_key_exists('parameters', $data) && $data['parameters'] !== null ? $data['parameters'] : null)
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null);
    }

    public function toJson(): array {
        return array(
            "event" => $this->getEvent(),
            "parameters" => $this->getParameters(),
            "timestamp" => $this->getTimestamp(),
        );
    }
}