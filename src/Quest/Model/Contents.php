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

namespace Gs2\Quest\Model;

use Gs2\Core\Model\IModel;


class Contents implements IModel {
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var array
	 */
	private $completeAcquireActions;
	/**
     * @var int
	 */
	private $weight;

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): Contents {
		$this->metadata = $metadata;
		return $this;
	}

	public function getCompleteAcquireActions(): ?array {
		return $this->completeAcquireActions;
	}

	public function setCompleteAcquireActions(?array $completeAcquireActions) {
		$this->completeAcquireActions = $completeAcquireActions;
	}

	public function withCompleteAcquireActions(?array $completeAcquireActions): Contents {
		$this->completeAcquireActions = $completeAcquireActions;
		return $this;
	}

	public function getWeight(): ?int {
		return $this->weight;
	}

	public function setWeight(?int $weight) {
		$this->weight = $weight;
	}

	public function withWeight(?int $weight): Contents {
		$this->weight = $weight;
		return $this;
	}

    public static function fromJson(?array $data): ?Contents {
        if ($data === null) {
            return null;
        }
        return (new Contents())
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCompleteAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('completeAcquireActions', $data) && $data['completeAcquireActions'] !== null ? $data['completeAcquireActions'] : []
            ))
            ->withWeight(array_key_exists('weight', $data) && $data['weight'] !== null ? $data['weight'] : null);
    }

    public function toJson(): array {
        return array(
            "metadata" => $this->getMetadata(),
            "completeAcquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getCompleteAcquireActions() !== null && $this->getCompleteAcquireActions() !== null ? $this->getCompleteAcquireActions() : []
            ),
            "weight" => $this->getWeight(),
        );
    }
}