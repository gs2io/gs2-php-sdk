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


class Event implements IModel {
	/**
     * @var string
	 */
	private $eventId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $resourceName;
	/**
     * @var string
	 */
	private $type;
	/**
     * @var string
	 */
	private $message;
	/**
     * @var int
	 */
	private $eventAt;

	public function getEventId(): ?string {
		return $this->eventId;
	}

	public function setEventId(?string $eventId) {
		$this->eventId = $eventId;
	}

	public function withEventId(?string $eventId): Event {
		$this->eventId = $eventId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Event {
		$this->name = $name;
		return $this;
	}

	public function getResourceName(): ?string {
		return $this->resourceName;
	}

	public function setResourceName(?string $resourceName) {
		$this->resourceName = $resourceName;
	}

	public function withResourceName(?string $resourceName): Event {
		$this->resourceName = $resourceName;
		return $this;
	}

	public function getType(): ?string {
		return $this->type;
	}

	public function setType(?string $type) {
		$this->type = $type;
	}

	public function withType(?string $type): Event {
		$this->type = $type;
		return $this;
	}

	public function getMessage(): ?string {
		return $this->message;
	}

	public function setMessage(?string $message) {
		$this->message = $message;
	}

	public function withMessage(?string $message): Event {
		$this->message = $message;
		return $this;
	}

	public function getEventAt(): ?int {
		return $this->eventAt;
	}

	public function setEventAt(?int $eventAt) {
		$this->eventAt = $eventAt;
	}

	public function withEventAt(?int $eventAt): Event {
		$this->eventAt = $eventAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Event {
        if ($data === null) {
            return null;
        }
        return (new Event())
            ->withEventId(empty($data['eventId']) ? null : $data['eventId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withResourceName(empty($data['resourceName']) ? null : $data['resourceName'])
            ->withType(empty($data['type']) ? null : $data['type'])
            ->withMessage(empty($data['message']) ? null : $data['message'])
            ->withEventAt(empty($data['eventAt']) ? null : $data['eventAt']);
    }

    public function toJson(): array {
        return array(
            "eventId" => $this->getEventId(),
            "name" => $this->getName(),
            "resourceName" => $this->getResourceName(),
            "type" => $this->getType(),
            "message" => $this->getMessage(),
            "eventAt" => $this->getEventAt(),
        );
    }
}