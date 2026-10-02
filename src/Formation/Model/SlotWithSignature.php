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

namespace Gs2\Formation\Model;

use Gs2\Core\Model\IModel;


/**
 * Signature Slot
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#slotwithsignature
 */
class SlotWithSignature implements IModel {
	/**
     * @var string Slot Model name
	 */
	private $name;
	/**
     * @var string Property Type
	 */
	private $propertyType;
	/**
     * @var string Payload
	 */
	private $body;
	/**
     * @var string Signature that proves ownership of the resource referenced by the property ID
	 */
	private $signature;
	/**
     * @var string Metadata
	 */
	private $metadata;
    /** @return string|null Slot Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Slot Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Slot Model name
     * @return SlotWithSignature
     */
	public function withName(?string $name): SlotWithSignature {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Property Type */
	public function getPropertyType(): ?string {
		return $this->propertyType;
	}
    /** @param string|null $propertyType Property Type */
	public function setPropertyType(?string $propertyType) {
		$this->propertyType = $propertyType;
	}
    /**
     * @param string|null $propertyType Property Type
     * @return SlotWithSignature
     */
	public function withPropertyType(?string $propertyType): SlotWithSignature {
		$this->propertyType = $propertyType;
		return $this;
	}
    /** @return string|null Payload */
	public function getBody(): ?string {
		return $this->body;
	}
    /** @param string|null $body Payload */
	public function setBody(?string $body) {
		$this->body = $body;
	}
    /**
     * @param string|null $body Payload
     * @return SlotWithSignature
     */
	public function withBody(?string $body): SlotWithSignature {
		$this->body = $body;
		return $this;
	}
    /** @return string|null Signature that proves ownership of the resource referenced by the property ID */
	public function getSignature(): ?string {
		return $this->signature;
	}
    /** @param string|null $signature Signature that proves ownership of the resource referenced by the property ID */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}
    /**
     * @param string|null $signature Signature that proves ownership of the resource referenced by the property ID
     * @return SlotWithSignature
     */
	public function withSignature(?string $signature): SlotWithSignature {
		$this->signature = $signature;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return SlotWithSignature
     */
	public function withMetadata(?string $metadata): SlotWithSignature {
		$this->metadata = $metadata;
		return $this;
	}

    public static function fromJson(?array $data): ?SlotWithSignature {
        if ($data === null) {
            return null;
        }
        return (new SlotWithSignature())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withPropertyType(array_key_exists('propertyType', $data) && $data['propertyType'] !== null ? $data['propertyType'] : null)
            ->withBody(array_key_exists('body', $data) && $data['body'] !== null ? $data['body'] : null)
            ->withSignature(array_key_exists('signature', $data) && $data['signature'] !== null ? $data['signature'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "propertyType" => $this->getPropertyType(),
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
            "metadata" => $this->getMetadata(),
        );
    }
}