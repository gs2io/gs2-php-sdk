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

namespace Gs2\Deploy\Model;

use Gs2\Core\Model\IModel;


/**
 * Event
 *
 * @see https://docs.gs2.io/api_reference/deploy/sdk/#event
 */
class Event implements IModel {
	/**
     * @var string Event GRN
	 */
	private $eventId;
	/**
     * @var string Event name
	 */
	private $name;
	/**
     * @var string Resource name
	 */
	private $resourceName;
	/**
     * @var string Status
	 */
	private $type;
	/**
     * @var string Message
	 */
	private $message;
	/**
     * @var int Creation Timestamp
	 */
	private $eventAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Event GRN */
	public function getEventId(): ?string {
		return $this->eventId;
	}
    /** @param string|null $eventId Event GRN */
	public function setEventId(?string $eventId) {
		$this->eventId = $eventId;
	}
    /**
     * @param string|null $eventId Event GRN
     * @return Event
     */
	public function withEventId(?string $eventId): Event {
		$this->eventId = $eventId;
		return $this;
	}
    /** @return string|null Event name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Event name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Event name
     * @return Event
     */
	public function withName(?string $name): Event {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Resource name */
	public function getResourceName(): ?string {
		return $this->resourceName;
	}
    /** @param string|null $resourceName Resource name */
	public function setResourceName(?string $resourceName) {
		$this->resourceName = $resourceName;
	}
    /**
     * @param string|null $resourceName Resource name
     * @return Event
     */
	public function withResourceName(?string $resourceName): Event {
		$this->resourceName = $resourceName;
		return $this;
	}
    /** @return string|null Status */
	public function getType(): ?string {
		return $this->type;
	}
    /** @param string|null $type Status */
	public function setType(?string $type) {
		$this->type = $type;
	}
    /**
     * @param string|null $type Status
     * @return Event
     */
	public function withType(?string $type): Event {
		$this->type = $type;
		return $this;
	}
    /** @return string|null Message */
	public function getMessage(): ?string {
		return $this->message;
	}
    /** @param string|null $message Message */
	public function setMessage(?string $message) {
		$this->message = $message;
	}
    /**
     * @param string|null $message Message
     * @return Event
     */
	public function withMessage(?string $message): Event {
		$this->message = $message;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getEventAt(): ?int {
		return $this->eventAt;
	}
    /** @param int|null $eventAt Creation Timestamp */
	public function setEventAt(?int $eventAt) {
		$this->eventAt = $eventAt;
	}
    /**
     * @param int|null $eventAt Creation Timestamp
     * @return Event
     */
	public function withEventAt(?int $eventAt): Event {
		$this->eventAt = $eventAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Event
     */
	public function withRevision(?int $revision): Event {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Event {
        if ($data === null) {
            return null;
        }
        return (new Event())
            ->withEventId(array_key_exists('eventId', $data) && $data['eventId'] !== null ? $data['eventId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withResourceName(array_key_exists('resourceName', $data) && $data['resourceName'] !== null ? $data['resourceName'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withMessage(array_key_exists('message', $data) && $data['message'] !== null ? $data['message'] : null)
            ->withEventAt(array_key_exists('eventAt', $data) && $data['eventAt'] !== null ? $data['eventAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "eventId" => $this->getEventId(),
            "name" => $this->getName(),
            "resourceName" => $this->getResourceName(),
            "type" => $this->getType(),
            "message" => $this->getMessage(),
            "eventAt" => $this->getEventAt(),
            "revision" => $this->getRevision(),
        );
    }
}