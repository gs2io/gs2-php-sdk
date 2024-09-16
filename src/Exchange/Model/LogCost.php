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

namespace Gs2\Exchange\Model;

use Gs2\Core\Model\IModel;


class LogCost implements IModel {
	/**
     * @var float
	 */
	private $base;
	/**
     * @var array
	 */
	private $adds;
	/**
     * @var array
	 */
	private $subs;
	public function getBase(): ?float {
		return $this->base;
	}
	public function setBase(?float $base) {
		$this->base = $base;
	}
	public function withBase(?float $base): LogCost {
		$this->base = $base;
		return $this;
	}
	public function getAdds(): ?array {
		return $this->adds;
	}
	public function setAdds(?array $adds) {
		$this->adds = $adds;
	}
	public function withAdds(?array $adds): LogCost {
		$this->adds = $adds;
		return $this;
	}
	public function getSubs(): ?array {
		return $this->subs;
	}
	public function setSubs(?array $subs) {
		$this->subs = $subs;
	}
	public function withSubs(?array $subs): LogCost {
		$this->subs = $subs;
		return $this;
	}

    public static function fromJson(?array $data): ?LogCost {
        if ($data === null) {
            return null;
        }
        return (new LogCost())
            ->withBase(array_key_exists('base', $data) && $data['base'] !== null ? $data['base'] : null)
            ->withAdds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('adds', $data) && $data['adds'] !== null ? $data['adds'] : []
            ))
            ->withSubs(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('subs', $data) && $data['subs'] !== null ? $data['subs'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "base" => $this->getBase(),
            "adds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getAdds() !== null && $this->getAdds() !== null ? $this->getAdds() : []
            ),
            "subs" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getSubs() !== null && $this->getSubs() !== null ? $this->getSubs() : []
            ),
        );
    }
}