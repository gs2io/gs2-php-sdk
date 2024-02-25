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

namespace Gs2\SeasonRating\Model;

use Gs2\Core\Model\IModel;


class TierModel implements IModel {
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $raiseRankBonus;
	/**
     * @var int
	 */
	private $entryFee;
	/**
     * @var int
	 */
	private $minimumChangePoint;
	/**
     * @var int
	 */
	private $maximumChangePoint;
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): TierModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getRaiseRankBonus(): ?int {
		return $this->raiseRankBonus;
	}
	public function setRaiseRankBonus(?int $raiseRankBonus) {
		$this->raiseRankBonus = $raiseRankBonus;
	}
	public function withRaiseRankBonus(?int $raiseRankBonus): TierModel {
		$this->raiseRankBonus = $raiseRankBonus;
		return $this;
	}
	public function getEntryFee(): ?int {
		return $this->entryFee;
	}
	public function setEntryFee(?int $entryFee) {
		$this->entryFee = $entryFee;
	}
	public function withEntryFee(?int $entryFee): TierModel {
		$this->entryFee = $entryFee;
		return $this;
	}
	public function getMinimumChangePoint(): ?int {
		return $this->minimumChangePoint;
	}
	public function setMinimumChangePoint(?int $minimumChangePoint) {
		$this->minimumChangePoint = $minimumChangePoint;
	}
	public function withMinimumChangePoint(?int $minimumChangePoint): TierModel {
		$this->minimumChangePoint = $minimumChangePoint;
		return $this;
	}
	public function getMaximumChangePoint(): ?int {
		return $this->maximumChangePoint;
	}
	public function setMaximumChangePoint(?int $maximumChangePoint) {
		$this->maximumChangePoint = $maximumChangePoint;
	}
	public function withMaximumChangePoint(?int $maximumChangePoint): TierModel {
		$this->maximumChangePoint = $maximumChangePoint;
		return $this;
	}

    public static function fromJson(?array $data): ?TierModel {
        if ($data === null) {
            return null;
        }
        return (new TierModel())
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withRaiseRankBonus(array_key_exists('raiseRankBonus', $data) && $data['raiseRankBonus'] !== null ? $data['raiseRankBonus'] : null)
            ->withEntryFee(array_key_exists('entryFee', $data) && $data['entryFee'] !== null ? $data['entryFee'] : null)
            ->withMinimumChangePoint(array_key_exists('minimumChangePoint', $data) && $data['minimumChangePoint'] !== null ? $data['minimumChangePoint'] : null)
            ->withMaximumChangePoint(array_key_exists('maximumChangePoint', $data) && $data['maximumChangePoint'] !== null ? $data['maximumChangePoint'] : null);
    }

    public function toJson(): array {
        return array(
            "metadata" => $this->getMetadata(),
            "raiseRankBonus" => $this->getRaiseRankBonus(),
            "entryFee" => $this->getEntryFee(),
            "minimumChangePoint" => $this->getMinimumChangePoint(),
            "maximumChangePoint" => $this->getMaximumChangePoint(),
        );
    }
}