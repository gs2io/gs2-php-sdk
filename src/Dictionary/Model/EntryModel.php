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

namespace Gs2\Dictionary\Model;

use Gs2\Core\Model\IModel;


/**
 * Entry Model
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#entrymodel
 */
class EntryModel implements IModel {
	/**
     * @var string Entry Model GRN
	 */
	private $entryModelId;
	/**
     * @var string Entry Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
    /** @return string|null Entry Model GRN */
	public function getEntryModelId(): ?string {
		return $this->entryModelId;
	}
    /** @param string|null $entryModelId Entry Model GRN */
	public function setEntryModelId(?string $entryModelId) {
		$this->entryModelId = $entryModelId;
	}
    /**
     * @param string|null $entryModelId Entry Model GRN
     * @return EntryModel
     */
	public function withEntryModelId(?string $entryModelId): EntryModel {
		$this->entryModelId = $entryModelId;
		return $this;
	}
    /** @return string|null Entry Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Entry Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Entry Model name
     * @return EntryModel
     */
	public function withName(?string $name): EntryModel {
		$this->name = $name;
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
     * @return EntryModel
     */
	public function withMetadata(?string $metadata): EntryModel {
		$this->metadata = $metadata;
		return $this;
	}

    public static function fromJson(?array $data): ?EntryModel {
        if ($data === null) {
            return null;
        }
        return (new EntryModel())
            ->withEntryModelId(array_key_exists('entryModelId', $data) && $data['entryModelId'] !== null ? $data['entryModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null);
    }

    public function toJson(): array {
        return array(
            "entryModelId" => $this->getEntryModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
        );
    }
}