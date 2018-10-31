<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Matchmaking\Control;
use Gs2\Matchmaking\Model\CustomAutoGathering;

/**
 * @author Game Server Services, Inc.
 */
class CustomAutoDoMatchmakingResult {

	/** @var bool マッチメイキングが完了したか */
	private $done;

	/** @var CustomAutoGathering CustomAutoマッチメイキング ギャザリング */
	private $item;

	/** @var string 検索を再開するためのコンテキスト */
	private $searchContext;

    public function __construct(array $array)
    {
        if(isset($array['done'])) {
            $this->done = $array['done'];
        }
        if(isset($array['item'])) {
            $this->item = CustomAutoGathering::build($array['item']);
        }
        if(isset($array['searchContext'])) {
            $this->searchContext = $array['searchContext'];
        }
    }

	/**
	 * マッチメイキングが完了したかを取得
	 *
	 * @return bool マッチメイキングが完了したか
	 */
	public function getDone() {
		return $this->done;
	}

	/**
	 * マッチメイキングが完了したかを設定
	 *
	 * @param bool $done マッチメイキングが完了したか
	 */
	public function setDone($done) {
		$this->done = $done;
	}

	/**
	 * CustomAutoマッチメイキング ギャザリングを取得
	 *
	 * @return CustomAutoGathering CustomAutoマッチメイキング ギャザリング
	 */
	public function getItem() {
		return $this->item;
	}

	/**
	 * CustomAutoマッチメイキング ギャザリングを設定
	 *
	 * @param CustomAutoGathering $item CustomAutoマッチメイキング ギャザリング
	 */
	public function setItem($item) {
		$this->item = $item;
	}

	/**
	 * 検索を再開するためのコンテキストを取得
	 *
	 * @return string 検索を再開するためのコンテキスト
	 */
	public function getSearchContext() {
		return $this->searchContext;
	}

	/**
	 * 検索を再開するためのコンテキストを設定
	 *
	 * @param string $searchContext 検索を再開するためのコンテキスト
	 */
	public function setSearchContext($searchContext) {
		$this->searchContext = $searchContext;
	}
}