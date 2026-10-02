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
 * Event
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#event
 */
class Event implements IModel {
	/**
     * @var string Event type
	 */
	private $eventType;
	/**
     * @var ChangeStateEvent Change state
	 */
	private $changeStateEvent;
	/**
     * @var EmitEvent Send a message
	 */
	private $emitEvent;
    /** @return string|null Event type */
	public function getEventType(): ?string {
		return $this->eventType;
	}
    /** @param string|null $eventType Event type */
	public function setEventType(?string $eventType) {
		$this->eventType = $eventType;
	}
    /**
     * @param string|null $eventType Event type
     * @return Event
     */
	public function withEventType(?string $eventType): Event {
		$this->eventType = $eventType;
		return $this;
	}
    /** @return ChangeStateEvent|null Change state */
	public function getChangeStateEvent(): ?ChangeStateEvent {
		return $this->changeStateEvent;
	}
    /** @param ChangeStateEvent|null $changeStateEvent Change state */
	public function setChangeStateEvent(?ChangeStateEvent $changeStateEvent) {
		$this->changeStateEvent = $changeStateEvent;
	}
    /**
     * @param ChangeStateEvent|null $changeStateEvent Change state
     * @return Event
     */
	public function withChangeStateEvent(?ChangeStateEvent $changeStateEvent): Event {
		$this->changeStateEvent = $changeStateEvent;
		return $this;
	}
    /** @return EmitEvent|null Send a message */
	public function getEmitEvent(): ?EmitEvent {
		return $this->emitEvent;
	}
    /** @param EmitEvent|null $emitEvent Send a message */
	public function setEmitEvent(?EmitEvent $emitEvent) {
		$this->emitEvent = $emitEvent;
	}
    /**
     * @param EmitEvent|null $emitEvent Send a message
     * @return Event
     */
	public function withEmitEvent(?EmitEvent $emitEvent): Event {
		$this->emitEvent = $emitEvent;
		return $this;
	}

    public static function fromJson(?array $data): ?Event {
        if ($data === null) {
            return null;
        }
        return (new Event())
            ->withEventType(array_key_exists('eventType', $data) && $data['eventType'] !== null ? $data['eventType'] : null)
            ->withChangeStateEvent(array_key_exists('changeStateEvent', $data) && $data['changeStateEvent'] !== null ? ChangeStateEvent::fromJson($data['changeStateEvent']) : null)
            ->withEmitEvent(array_key_exists('emitEvent', $data) && $data['emitEvent'] !== null ? EmitEvent::fromJson($data['emitEvent']) : null);
    }

    public function toJson(): array {
        return array(
            "eventType" => $this->getEventType(),
            "changeStateEvent" => $this->getChangeStateEvent() !== null ? $this->getChangeStateEvent()->toJson() : null,
            "emitEvent" => $this->getEmitEvent() !== null ? $this->getEmitEvent()->toJson() : null,
        );
    }
}